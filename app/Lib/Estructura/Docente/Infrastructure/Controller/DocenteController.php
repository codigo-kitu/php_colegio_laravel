<?php declare(strict_types = 1);

namespace App\Lib\Estructura\Docente\Infrastructure\Controller;

use App\Http\Controllers\Controller;

use App\Lib\Base\Infrastructure\Request\GetAllRequest;
use App\Lib\Base\Infrastructure\Request\GetIdRequest;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

use App\Lib\Estructura\Docente\Infrastructure\Util\Request\DocenteCreateRequest;
use App\Lib\Estructura\Docente\Infrastructure\Util\Request\DocenteUpdateRequest;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Estructura\Docente\Domain\Entity\Docente;

use App\Lib\Estructura\Docente\Application\Logic\DocenteLogicI;
use App\Lib\Estructura\Docente\Application\Logic\DocenteLogic;


use App\Lib\Estructura\Docente\Infrastructure\Util\Return\DocenteReturnView;


class DocenteController extends Controller {
		
	public DocenteLogicI $docenteLogicI;
	
	public Docente $docente1;
	public array $docentes;
	
	public Pagination $pagination1;
	public bool $is_validated=false;
	public string $response_json='';
	
	public DocenteReturnView $docenteReturnView;
	
	
	public static string $ROUTE='/colegio_relaciones/estructura/docente_api';
	
	function __construct() {
		$this->docenteLogicI = new DocenteLogic();
		
		$this->docente1 = new Docente();
		
		$this->docentes = array();		
		
		$this->pagination1 = new Pagination();		
		$this->docenteReturnView = new DocenteReturnView();
		
		
		/*Log::channel('stderr')->info('Controller Created');*/
    }
	
	public function setReturnView(TipoAccionEnum $tipo_accion_enum1) : void {
		/*
		$this->docentes = $this->docenteLogicI->docentes;
		$this->docente1 = $this->docenteLogicI->docente1;				
		*/
		
		$this->docenteReturnView->setReturnView($tipo_accion_enum1,$this->docente1,$this->docentes);		
	}
	
	public function getIndex(GetAllRequest $request) : JsonResponse {		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$this->pagination1 = new Pagination();
			$this->pagination1->skip = intval($request->input('pagination.skip'));
			$this->pagination1->limit = intval($request->input('pagination.limit'));
			
			$this->docentes = $this->docenteLogicI->getIndex($this->pagination1);
					
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);			
			$response_json = response()->json($this->docenteReturnView,Response::HTTP_OK);
		
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
			
			$this->docentes = $this->docenteLogicI->getTodos($this->pagination1);			
			
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);				
			$response_json = response()->json($this->docenteReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function getSeleccionar(GetIdRequest $request) : JsonResponse {   		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$id = $request->input('id');			
			$this->docente1 = $this->docenteLogicI->getSeleccionar($id);
			
			$this->setReturnView(TipoAccionEnum::SELECCIONAR);
			$response_json = response()->json($this->docenteReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}			
	
	public function nuevo(DocenteCreateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			
			$values = $request->input('docente');			
			$this->docente1 = $this->docenteLogicI->nuevo($values);
			
			$this->setReturnView(TipoAccionEnum::NUEVO);			
			$response_json = response()->json($this->docenteReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function actualizar(DocenteUpdateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			$id = $request->input('docente.id');
			$values = $request->input('docente');			
			$updated = $this->docenteLogicI->actualizar($id,$values);
			
			$this->setReturnView(TipoAccionEnum::ACTUALIZAR);					
			$response_json = response()->json($this->docenteReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function eliminar(GetIdRequest $request) : JsonResponse {
		
		$is_validated = $request->validated();
		
		if($is_validated) {	
			
			$id = $request->input('id');			
			$deleted = $this->docenteLogicI->eliminar($id);
			
			$this->setReturnView(TipoAccionEnum::ELIMINAR);					
			$response_json = response()->json($this->docenteReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function nuevos(Request $request) : JsonResponse {
		$news_docentes = $request->input('news_docentes');
		
		$this->docenteLogicI->nuevos($news_docentes);
				
		$this->setReturnView(TipoAccionEnum::NUEVO);
				
		return response()->json($this->docenteReturnView,Response::HTTP_OK);
	}
	
	public function eliminars(Request $request) : JsonResponse {
		$ids_deletes_docentes = $request->input('ids_deletes_docentes');
		
		$this->docenteLogicI->eliminars($ids_deletes_docentes);
				
		$this->setReturnView(TipoAccionEnum::ELIMINAR);
				
		return response()->json($this->docenteReturnView,Response::HTTP_OK);
	}
	
	public function actualizars(Request $request) : JsonResponse {
		$updates_docentes = $request->input('updates_docentes');
		$updates_columnas = $request->input('updates_columnas');
		
		$this->docenteLogicI->actualizars($updates_docentes,$updates_columnas);
		
		$this->setReturnView(TipoAccionEnum::ACTUALIZAR);
				
		return response()->json($this->docenteReturnView,Response::HTTP_OK);
	}
	
	public function guardarCambios(Request $request) : JsonResponse {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		$news_docentes = $request->input('news_docentes');
		/*--- Deletes ---*/
		$ids_deletes_docentes = $request->input('ids_deletes_docentes');
		/*--- Updates ---*/
		$updates_docentes = $request->input('updates_docentes');
		$updates_columnas = $request->input('updates_columnas');
		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/		
		/*--- Updates ---*/
		
		$this->docenteLogicI->guardarCambios($news_docentes,$ids_deletes_docentes,$updates_docentes,$updates_columnas);
				
		$this->setReturnView(TipoAccionEnum::GUARDAR_CAMBIOS);
				
		return response()->json($this->docenteReturnView,Response::HTTP_OK);
	}
	
	
	/*----- RELACIONES -----*/
	
	public function getTodosRelaciones(GetAllRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			$this->pagination1 = new Pagination();
			$this->pagination1->skip = intval($request->input('pagination.skip'));
			$this->pagination1->limit = intval($request->input('pagination.limit'));
			
			$this->docentes = $this->docenteLogicI->getTodosRelaciones($this->pagination1);										
			
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);					
			$response_json = response()->json($this->docenteReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function getSeleccionarRelaciones(GetIdRequest $request) : JsonResponse {   
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$id = $request->input('id');			
			$this->docente1 = $this->docenteLogicI->getSeleccionarRelaciones($id);
					
			$this->setReturnView(TipoAccionEnum::SELECCIONAR);			
			$response_json = response()->json($this->docenteReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
}
