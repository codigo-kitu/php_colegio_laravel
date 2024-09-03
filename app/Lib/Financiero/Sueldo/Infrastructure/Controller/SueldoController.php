<?php declare(strict_types = 1);

namespace App\Lib\Financiero\Sueldo\Infrastructure\Controller;

use App\Http\Controllers\Controller;

use App\Lib\Base\Infrastructure\Request\GetAllRequest;
use App\Lib\Base\Infrastructure\Request\GetIdRequest;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

use App\Lib\Financiero\Sueldo\Infrastructure\Util\Request\SueldoCreateRequest;
use App\Lib\Financiero\Sueldo\Infrastructure\Util\Request\SueldoUpdateRequest;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Financiero\Sueldo\Domain\Entity\Sueldo;

use App\Lib\Financiero\Sueldo\Application\Logic\SueldoLogicI;
use App\Lib\Financiero\Sueldo\Application\Logic\SueldoLogic;

/*FKs*/
use App\Lib\Estructura\Docente\Domain\Entity\Docente;
		

use App\Lib\Financiero\Sueldo\Infrastructure\Util\Return\SueldoReturnView;

/*FKs*/
use App\Lib\Financiero\Sueldo\Infrastructure\Util\Return\SueldoFKReturnView;	

class SueldoController extends Controller {
		
	public SueldoLogicI $sueldoLogicI;
	
	public Sueldo $sueldo1;
	public array $sueldos;
	
	public Pagination $pagination1;
	public bool $is_validated=false;
	public string $response_json='';
	
	public SueldoReturnView $sueldoReturnView;
	
	/*FKs*/
	public SueldoFKReturnView $sueldoFKReturnView;		
	
	public static string $ROUTE='/colegio_relaciones/financiero/sueldo_api';
	
	function __construct() {
		$this->sueldoLogicI = new SueldoLogic();
		
		$this->sueldo1 = new Sueldo();
		
		$this->sueldos = array();		
		
		$this->pagination1 = new Pagination();		
		$this->sueldoReturnView = new SueldoReturnView();
		
		/*FKs*/
		$this->sueldoFKReturnView = new SueldoFKReturnView();				
		
		/*Log::channel('stderr')->info('Controller Created');*/
    }
	
	public function setReturnView(TipoAccionEnum $tipo_accion_enum1) : void {
		/*
		$this->sueldos = $this->sueldoLogicI->sueldos;
		$this->sueldo1 = $this->sueldoLogicI->sueldo1;				
		*/
		
		$this->sueldoReturnView->setReturnView($tipo_accion_enum1,$this->sueldo1,$this->sueldos);		
	}
	
	public function getIndex(GetAllRequest $request) : JsonResponse {		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$this->pagination1 = new Pagination();
			$this->pagination1->skip = intval($request->input('pagination.skip'));
			$this->pagination1->limit = intval($request->input('pagination.limit'));
			
			$this->sueldos = $this->sueldoLogicI->getIndex($this->pagination1);
					
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);			
			$response_json = response()->json($this->sueldoReturnView,Response::HTTP_OK);
		
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
			
			$this->sueldos = $this->sueldoLogicI->getTodos($this->pagination1);			
			
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);				
			$response_json = response()->json($this->sueldoReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function getSeleccionar(GetIdRequest $request) : JsonResponse {   		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$id = $request->input('id');			
			$this->sueldo1 = $this->sueldoLogicI->getSeleccionar($id);
			
			$this->setReturnView(TipoAccionEnum::SELECCIONAR);
			$response_json = response()->json($this->sueldoReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}			
	
	public function nuevo(SueldoCreateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			
			$values = $request->input('sueldo');			
			$this->sueldo1 = $this->sueldoLogicI->nuevo($values);
			
			$this->setReturnView(TipoAccionEnum::NUEVO);			
			$response_json = response()->json($this->sueldoReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function actualizar(SueldoUpdateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			$id = $request->input('sueldo.id');
			$values = $request->input('sueldo');			
			$updated = $this->sueldoLogicI->actualizar($id,$values);
			
			$this->setReturnView(TipoAccionEnum::ACTUALIZAR);					
			$response_json = response()->json($this->sueldoReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function eliminar(GetIdRequest $request) : JsonResponse {
		
		$is_validated = $request->validated();
		
		if($is_validated) {	
			
			$id = $request->input('id');			
			$deleted = $this->sueldoLogicI->eliminar($id);
			
			$this->setReturnView(TipoAccionEnum::ELIMINAR);					
			$response_json = response()->json($this->sueldoReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function nuevos(Request $request) : JsonResponse {
		$news_sueldos = $request->input('news_sueldos');
		
		$this->sueldoLogicI->nuevos($news_sueldos);
				
		$this->setReturnView(TipoAccionEnum::NUEVO);
				
		return response()->json($this->sueldoReturnView,Response::HTTP_OK);
	}
	
	public function eliminars(Request $request) : JsonResponse {
		$ids_deletes_sueldos = $request->input('ids_deletes_sueldos');
		
		$this->sueldoLogicI->eliminars($ids_deletes_sueldos);
				
		$this->setReturnView(TipoAccionEnum::ELIMINAR);
				
		return response()->json($this->sueldoReturnView,Response::HTTP_OK);
	}
	
	public function actualizars(Request $request) : JsonResponse {
		$updates_sueldos = $request->input('updates_sueldos');
		$updates_columnas = $request->input('updates_columnas');
		
		$this->sueldoLogicI->actualizars($updates_sueldos,$updates_columnas);
		
		$this->setReturnView(TipoAccionEnum::ACTUALIZAR);
				
		return response()->json($this->sueldoReturnView,Response::HTTP_OK);
	}
	
	public function guardarCambios(Request $request) : JsonResponse {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		$news_sueldos = $request->input('news_sueldos');
		/*--- Deletes ---*/
		$ids_deletes_sueldos = $request->input('ids_deletes_sueldos');
		/*--- Updates ---*/
		$updates_sueldos = $request->input('updates_sueldos');
		$updates_columnas = $request->input('updates_columnas');
		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/		
		/*--- Updates ---*/
		
		$this->sueldoLogicI->guardarCambios($news_sueldos,$ids_deletes_sueldos,$updates_sueldos,$updates_columnas);
				
		$this->setReturnView(TipoAccionEnum::GUARDAR_CAMBIOS);
				
		return response()->json($this->sueldoReturnView,Response::HTTP_OK);
	}
	
	/*FKs*/
	
	public function getFks(Request $request) : JsonResponse {
		
		$this->sueldoLogicI->getFks();
		
		$this->sueldoFKReturnView->docentesFK = $this->sueldoLogicI->docentesFK;
						
		return response()->json($this->sueldoFKReturnView,Response::HTTP_OK);
	}
	
}
