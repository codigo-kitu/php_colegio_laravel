<?php declare(strict_types = 1);

namespace App\Lib\Financiero\Pension\Infrastructure\Controller;

use App\Http\Controllers\Controller;

use App\Lib\Base\Infrastructure\Request\GetAllRequest;
use App\Lib\Base\Infrastructure\Request\GetIdRequest;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

use App\Lib\Financiero\Pension\Infrastructure\Util\Request\PensionCreateRequest;
use App\Lib\Financiero\Pension\Infrastructure\Util\Request\PensionUpdateRequest;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Financiero\Pension\Domain\Entity\Pension;

use App\Lib\Financiero\Pension\Application\Logic\PensionLogicI;
use App\Lib\Financiero\Pension\Application\Logic\PensionLogic;

/*FKs*/
use App\Lib\Estructura\Alumno\Domain\Entity\Alumno;
		

use App\Lib\Financiero\Pension\Infrastructure\Util\Return\PensionReturnView;

/*FKs*/
use App\Lib\Financiero\Pension\Infrastructure\Util\Return\PensionFKReturnView;	

class PensionController extends Controller {
		
	public PensionLogicI $pensionLogicI;
	
	public Pension $pension1;
	public array $pensions;
	
	public Pagination $pagination1;
	public bool $is_validated=false;
	public string $response_json='';
	
	public PensionReturnView $pensionReturnView;
	
	/*FKs*/
	public PensionFKReturnView $pensionFKReturnView;		
	
	public static string $ROUTE='/colegio_relaciones/financiero/pension_api';
	
	function __construct() {
		$this->pensionLogicI = new PensionLogic();
		
		$this->pension1 = new Pension();
		
		$this->pensions = array();		
		
		$this->pagination1 = new Pagination();		
		$this->pensionReturnView = new PensionReturnView();
		
		/*FKs*/
		$this->pensionFKReturnView = new PensionFKReturnView();				
		
		/*Log::channel('stderr')->info('Controller Created');*/
    }
	
	public function setReturnView(TipoAccionEnum $tipo_accion_enum1) : void {
		/*
		$this->pensions = $this->pensionLogicI->pensions;
		$this->pension1 = $this->pensionLogicI->pension1;				
		*/
		
		$this->pensionReturnView->setReturnView($tipo_accion_enum1,$this->pension1,$this->pensions);		
	}
	
	public function getIndex(GetAllRequest $request) : JsonResponse {		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$this->pagination1 = new Pagination();
			$this->pagination1->skip = intval($request->input('pagination.skip'));
			$this->pagination1->limit = intval($request->input('pagination.limit'));
			
			$this->pensions = $this->pensionLogicI->getIndex($this->pagination1);
					
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);			
			$response_json = response()->json($this->pensionReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function getTodos(GetAllRequest $request) : JsonResponse {
		
		$is_validated = $request->validated();
		
		if($is_validated) {
			$this->pagination1 = new Pagination();
			$this->pagination1->skip = intval($request->input('pagination.skip'));
			$this->pagination1->limit = intval($request->input('pagination.limit'));
			
			$this->pensions = $this->pensionLogicI->getTodos($this->pagination1);			
			
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);				
			$response_json = response()->json($this->pensionReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function getSeleccionar(GetIdRequest $request) : JsonResponse {   		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$id = $request->input('id');			
			$this->pension1 = $this->pensionLogicI->getSeleccionar($id);
			
			$this->setReturnView(TipoAccionEnum::SELECCIONAR);
			$response_json = response()->json($this->pensionReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}			
	
	public function nuevo(PensionCreateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			
			$values = $request->input('pension');			
			$this->pension1 = $this->pensionLogicI->nuevo($values);
			
			$this->setReturnView(TipoAccionEnum::NUEVO);			
			$response_json = response()->json($this->pensionReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function actualizar(PensionUpdateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			$id = $request->input('pension.id');
			$values = $request->input('pension');			
			$updated = $this->pensionLogicI->actualizar($id,$values);
			
			$this->setReturnView(TipoAccionEnum::ACTUALIZAR);					
			$response_json = response()->json($this->pensionReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function eliminar(GetIdRequest $request) : JsonResponse {
		
		$is_validated = $request->validated();
		
		if($is_validated) {	
			
			$id = $request->input('id');			
			$deleted = $this->pensionLogicI->eliminar($id);
			
			$this->setReturnView(TipoAccionEnum::ELIMINAR);					
			$response_json = response()->json($this->pensionReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function nuevos(Request $request) : JsonResponse {
		$news_pensions = $request->input('news_pensions');
		
		$this->pensionLogicI->nuevos($news_pensions);
				
		$this->setReturnView(TipoAccionEnum::NUEVO);
				
		return response()->json($this->pensionReturnView,Response::HTTP_OK);
	}
	
	public function eliminars(Request $request) : JsonResponse {
		$ids_deletes_pensions = $request->input('ids_deletes_pensions');
		
		$this->pensionLogicI->eliminars($ids_deletes_pensions);
				
		$this->setReturnView(TipoAccionEnum::ELIMINAR);
				
		return response()->json($this->pensionReturnView,Response::HTTP_OK);
	}
	
	public function actualizars(Request $request) : JsonResponse {
		$updates_pensions = $request->input('updates_pensions');
		$updates_columnas = $request->input('updates_columnas');
		
		$this->pensionLogicI->actualizars($updates_pensions,$updates_columnas);
		
		$this->setReturnView(TipoAccionEnum::ACTUALIZAR);
				
		return response()->json($this->pensionReturnView,Response::HTTP_OK);
	}
	
	public function guardarCambios(Request $request) : JsonResponse {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		$news_pensions = $request->input('news_pensions');
		/*--- Deletes ---*/
		$ids_deletes_pensions = $request->input('ids_deletes_pensions');
		/*--- Updates ---*/
		$updates_pensions = $request->input('updates_pensions');
		$updates_columnas = $request->input('updates_columnas');
		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/		
		/*--- Updates ---*/
		
		$this->pensionLogicI->guardarCambios($news_pensions,$ids_deletes_pensions,$updates_pensions,$updates_columnas);
				
		$this->setReturnView(TipoAccionEnum::GUARDAR_CAMBIOS);
				
		return response()->json($this->pensionReturnView,Response::HTTP_OK);
	}
	
	/*FKs*/
	
	public function getFks(Request $request) : JsonResponse {
		
		$this->pensionLogicI->getFks();
		
		$this->pensionFKReturnView->alumnosFK = $this->pensionLogicI->alumnosFK;
						
		return response()->json($this->pensionFKReturnView,Response::HTTP_OK);
	}
	
}
