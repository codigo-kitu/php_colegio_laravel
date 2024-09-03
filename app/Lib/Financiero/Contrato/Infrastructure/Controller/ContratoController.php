<?php declare(strict_types = 1);

namespace App\Lib\Financiero\Contrato\Infrastructure\Controller;

use App\Http\Controllers\Controller;

use App\Lib\Base\Infrastructure\Request\GetAllRequest;
use App\Lib\Base\Infrastructure\Request\GetIdRequest;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

use App\Lib\Financiero\Contrato\Infrastructure\Util\Request\ContratoCreateRequest;
use App\Lib\Financiero\Contrato\Infrastructure\Util\Request\ContratoUpdateRequest;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Financiero\Contrato\Domain\Entity\Contrato;

use App\Lib\Financiero\Contrato\Application\Logic\ContratoLogicI;
use App\Lib\Financiero\Contrato\Application\Logic\ContratoLogic;

/*FKs*/
use App\Lib\Estructura\Docente\Domain\Entity\Docente;
		

use App\Lib\Financiero\Contrato\Infrastructure\Util\Return\ContratoReturnView;

/*FKs*/
use App\Lib\Financiero\Contrato\Infrastructure\Util\Return\ContratoFKReturnView;	

class ContratoController extends Controller {
		
	public ContratoLogicI $contratoLogicI;
	
	public Contrato $contrato1;
	public array $contratos;
	
	public Pagination $pagination1;
	public bool $is_validated=false;
	public string $response_json='';
	
	public ContratoReturnView $contratoReturnView;
	
	/*FKs*/
	public ContratoFKReturnView $contratoFKReturnView;		
	
	public static string $ROUTE='/colegio_relaciones/financiero/contrato_api';
	
	function __construct() {
		$this->contratoLogicI = new ContratoLogic();
		
		$this->contrato1 = new Contrato();
		
		$this->contratos = array();		
		
		$this->pagination1 = new Pagination();		
		$this->contratoReturnView = new ContratoReturnView();
		
		/*FKs*/
		$this->contratoFKReturnView = new ContratoFKReturnView();				
		
		/*Log::channel('stderr')->info('Controller Created');*/
    }
	
	public function setReturnView(TipoAccionEnum $tipo_accion_enum1) : void {
		/*
		$this->contratos = $this->contratoLogicI->contratos;
		$this->contrato1 = $this->contratoLogicI->contrato1;				
		*/
		
		$this->contratoReturnView->setReturnView($tipo_accion_enum1,$this->contrato1,$this->contratos);		
	}
	
	public function getIndex(GetAllRequest $request) : JsonResponse {		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$this->pagination1 = new Pagination();
			$this->pagination1->skip = intval($request->input('pagination.skip'));
			$this->pagination1->limit = intval($request->input('pagination.limit'));
			
			$this->contratos = $this->contratoLogicI->getIndex($this->pagination1);
					
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);			
			$response_json = response()->json($this->contratoReturnView,Response::HTTP_OK);
		
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
			
			$this->contratos = $this->contratoLogicI->getTodos($this->pagination1);			
			
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);				
			$response_json = response()->json($this->contratoReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function getSeleccionar(GetIdRequest $request) : JsonResponse {   		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$id = $request->input('id');			
			$this->contrato1 = $this->contratoLogicI->getSeleccionar($id);
			
			$this->setReturnView(TipoAccionEnum::SELECCIONAR);
			$response_json = response()->json($this->contratoReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}			
	
	public function nuevo(ContratoCreateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			
			$values = $request->input('contrato');			
			$this->contrato1 = $this->contratoLogicI->nuevo($values);
			
			$this->setReturnView(TipoAccionEnum::NUEVO);			
			$response_json = response()->json($this->contratoReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function actualizar(ContratoUpdateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			$id = $request->input('contrato.id');
			$values = $request->input('contrato');			
			$updated = $this->contratoLogicI->actualizar($id,$values);
			
			$this->setReturnView(TipoAccionEnum::ACTUALIZAR);					
			$response_json = response()->json($this->contratoReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function eliminar(GetIdRequest $request) : JsonResponse {
		
		$is_validated = $request->validated();
		
		if($is_validated) {	
			
			$id = $request->input('id');			
			$deleted = $this->contratoLogicI->eliminar($id);
			
			$this->setReturnView(TipoAccionEnum::ELIMINAR);					
			$response_json = response()->json($this->contratoReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function nuevos(Request $request) : JsonResponse {
		$news_contratos = $request->input('news_contratos');
		
		$this->contratoLogicI->nuevos($news_contratos);
				
		$this->setReturnView(TipoAccionEnum::NUEVO);
				
		return response()->json($this->contratoReturnView,Response::HTTP_OK);
	}
	
	public function eliminars(Request $request) : JsonResponse {
		$ids_deletes_contratos = $request->input('ids_deletes_contratos');
		
		$this->contratoLogicI->eliminars($ids_deletes_contratos);
				
		$this->setReturnView(TipoAccionEnum::ELIMINAR);
				
		return response()->json($this->contratoReturnView,Response::HTTP_OK);
	}
	
	public function actualizars(Request $request) : JsonResponse {
		$updates_contratos = $request->input('updates_contratos');
		$updates_columnas = $request->input('updates_columnas');
		
		$this->contratoLogicI->actualizars($updates_contratos,$updates_columnas);
		
		$this->setReturnView(TipoAccionEnum::ACTUALIZAR);
				
		return response()->json($this->contratoReturnView,Response::HTTP_OK);
	}
	
	public function guardarCambios(Request $request) : JsonResponse {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		$news_contratos = $request->input('news_contratos');
		/*--- Deletes ---*/
		$ids_deletes_contratos = $request->input('ids_deletes_contratos');
		/*--- Updates ---*/
		$updates_contratos = $request->input('updates_contratos');
		$updates_columnas = $request->input('updates_columnas');
		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/		
		/*--- Updates ---*/
		
		$this->contratoLogicI->guardarCambios($news_contratos,$ids_deletes_contratos,$updates_contratos,$updates_columnas);
				
		$this->setReturnView(TipoAccionEnum::GUARDAR_CAMBIOS);
				
		return response()->json($this->contratoReturnView,Response::HTTP_OK);
	}
	
	/*FKs*/
	
	public function getFks(Request $request) : JsonResponse {
		
		$this->contratoLogicI->getFks();
		
		$this->contratoFKReturnView->docentesFK = $this->contratoLogicI->docentesFK;
						
		return response()->json($this->contratoFKReturnView,Response::HTTP_OK);
	}
	
}
