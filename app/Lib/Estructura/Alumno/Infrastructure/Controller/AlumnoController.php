<?php declare(strict_types = 1);

namespace App\Lib\Estructura\Alumno\Infrastructure\Controller;

use App\Http\Controllers\Controller;

use App\Lib\Base\Infrastructure\Request\GetAllRequest;
use App\Lib\Base\Infrastructure\Request\GetIdRequest;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

use App\Lib\Estructura\Alumno\Infrastructure\Util\Request\AlumnoCreateRequest;
use App\Lib\Estructura\Alumno\Infrastructure\Util\Request\AlumnoUpdateRequest;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Estructura\Alumno\Domain\Entity\Alumno;

use App\Lib\Estructura\Alumno\Application\Logic\AlumnoLogicI;
use App\Lib\Estructura\Alumno\Application\Logic\AlumnoLogic;


use App\Lib\Estructura\Alumno\Infrastructure\Util\Return\AlumnoReturnView;


class AlumnoController extends Controller {
		
	public AlumnoLogicI $alumnoLogicI;
	
	public Alumno $alumno1;
	public array $alumnos;
	
	public Pagination $pagination1;
	public bool $is_validated=false;
	public string $response_json='';
	
	public AlumnoReturnView $alumnoReturnView;
	
	
	public static string $ROUTE='/colegio_relaciones/estructura/alumno_api';
	
	function __construct() {
		$this->alumnoLogicI = new AlumnoLogic();
		
		$this->alumno1 = new Alumno();
		
		$this->alumnos = array();		
		
		$this->pagination1 = new Pagination();		
		$this->alumnoReturnView = new AlumnoReturnView();
		
		
		/*Log::channel('stderr')->info('Controller Created');*/
    }
	
	public function setReturnView(TipoAccionEnum $tipo_accion_enum1) : void {
		/*
		$this->alumnos = $this->alumnoLogicI->alumnos;
		$this->alumno1 = $this->alumnoLogicI->alumno1;				
		*/
		
		$this->alumnoReturnView->setReturnView($tipo_accion_enum1,$this->alumno1,$this->alumnos);		
	}
	
	public function getIndex(GetAllRequest $request) : JsonResponse {		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$this->pagination1 = new Pagination();
			$this->pagination1->skip = intval($request->input('pagination.skip'));
			$this->pagination1->limit = intval($request->input('pagination.limit'));
			
			$this->alumnos = $this->alumnoLogicI->getIndex($this->pagination1);
					
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);			
			$response_json = response()->json($this->alumnoReturnView,Response::HTTP_OK);
		
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
			
			$this->alumnos = $this->alumnoLogicI->getTodos($this->pagination1);			
			
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);				
			$response_json = response()->json($this->alumnoReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function getSeleccionar(GetIdRequest $request) : JsonResponse {   		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$id = $request->input('id');			
			$this->alumno1 = $this->alumnoLogicI->getSeleccionar($id);
			
			$this->setReturnView(TipoAccionEnum::SELECCIONAR);
			$response_json = response()->json($this->alumnoReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}			
	
	public function nuevo(AlumnoCreateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			
			$values = $request->input('alumno');			
			$this->alumno1 = $this->alumnoLogicI->nuevo($values);
			
			$this->setReturnView(TipoAccionEnum::NUEVO);			
			$response_json = response()->json($this->alumnoReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function actualizar(AlumnoUpdateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			$id = $request->input('alumno.id');
			$values = $request->input('alumno');			
			$updated = $this->alumnoLogicI->actualizar($id,$values);
			
			$this->setReturnView(TipoAccionEnum::ACTUALIZAR);					
			$response_json = response()->json($this->alumnoReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function eliminar(GetIdRequest $request) : JsonResponse {
		
		$is_validated = $request->validated();
		
		if($is_validated) {	
			
			$id = $request->input('id');			
			$deleted = $this->alumnoLogicI->eliminar($id);
			
			$this->setReturnView(TipoAccionEnum::ELIMINAR);					
			$response_json = response()->json($this->alumnoReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function nuevos(Request $request) : JsonResponse {
		$news_alumnos = $request->input('news_alumnos');
		
		$this->alumnoLogicI->nuevos($news_alumnos);
				
		$this->setReturnView(TipoAccionEnum::NUEVO);
				
		return response()->json($this->alumnoReturnView,Response::HTTP_OK);
	}
	
	public function eliminars(Request $request) : JsonResponse {
		$ids_deletes_alumnos = $request->input('ids_deletes_alumnos');
		
		$this->alumnoLogicI->eliminars($ids_deletes_alumnos);
				
		$this->setReturnView(TipoAccionEnum::ELIMINAR);
				
		return response()->json($this->alumnoReturnView,Response::HTTP_OK);
	}
	
	public function actualizars(Request $request) : JsonResponse {
		$updates_alumnos = $request->input('updates_alumnos');
		$updates_columnas = $request->input('updates_columnas');
		
		$this->alumnoLogicI->actualizars($updates_alumnos,$updates_columnas);
		
		$this->setReturnView(TipoAccionEnum::ACTUALIZAR);
				
		return response()->json($this->alumnoReturnView,Response::HTTP_OK);
	}
	
	public function guardarCambios(Request $request) : JsonResponse {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		$news_alumnos = $request->input('news_alumnos');
		/*--- Deletes ---*/
		$ids_deletes_alumnos = $request->input('ids_deletes_alumnos');
		/*--- Updates ---*/
		$updates_alumnos = $request->input('updates_alumnos');
		$updates_columnas = $request->input('updates_columnas');
		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/		
		/*--- Updates ---*/
		
		$this->alumnoLogicI->guardarCambios($news_alumnos,$ids_deletes_alumnos,$updates_alumnos,$updates_columnas);
				
		$this->setReturnView(TipoAccionEnum::GUARDAR_CAMBIOS);
				
		return response()->json($this->alumnoReturnView,Response::HTTP_OK);
	}
	
	
	/*----- RELACIONES -----*/
	
	public function getTodosRelaciones(GetAllRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			$this->pagination1 = new Pagination();
			$this->pagination1->skip = intval($request->input('pagination.skip'));
			$this->pagination1->limit = intval($request->input('pagination.limit'));
			
			$this->alumnos = $this->alumnoLogicI->getTodosRelaciones($this->pagination1);										
			
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);					
			$response_json = response()->json($this->alumnoReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function getSeleccionarRelaciones(GetIdRequest $request) : JsonResponse {   
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$id = $request->input('id');			
			$this->alumno1 = $this->alumnoLogicI->getSeleccionarRelaciones($id);
					
			$this->setReturnView(TipoAccionEnum::SELECCIONAR);			
			$response_json = response()->json($this->alumnoReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
}
