<?php declare(strict_types = 1);

namespace App\Lib\Estructura\AlumnoMateria\Infrastructure\Controller;

use App\Http\Controllers\Controller;

use App\Lib\Base\Infrastructure\Request\GetAllRequest;
use App\Lib\Base\Infrastructure\Request\GetIdRequest;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

use App\Lib\Estructura\AlumnoMateria\Infrastructure\Util\Request\AlumnoMateriaCreateRequest;
use App\Lib\Estructura\AlumnoMateria\Infrastructure\Util\Request\AlumnoMateriaUpdateRequest;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Estructura\AlumnoMateria\Domain\Entity\AlumnoMateria;

use App\Lib\Estructura\AlumnoMateria\Application\Logic\AlumnoMateriaLogicI;
use App\Lib\Estructura\AlumnoMateria\Application\Logic\AlumnoMateriaLogic;

/*FKs*/
use App\Lib\Estructura\Alumno\Domain\Entity\Alumno;
use App\Lib\Estructura\Materia\Domain\Entity\Materia;
		

use App\Lib\Estructura\AlumnoMateria\Infrastructure\Util\Return\AlumnoMateriaReturnView;

/*FKs*/
use App\Lib\Estructura\AlumnoMateria\Infrastructure\Util\Return\AlumnoMateriaFKReturnView;	

class AlumnoMateriaController extends Controller {
		
	public AlumnoMateriaLogicI $alumno_materiaLogicI;
	
	public AlumnoMateria $alumno_materia1;
	public array $alumno_materias;
	
	public Pagination $pagination1;
	public bool $is_validated=false;
	public string $response_json='';
	
	public AlumnoMateriaReturnView $alumno_materiaReturnView;
	
	/*FKs*/
	public AlumnoMateriaFKReturnView $alumno_materiaFKReturnView;		
	
	public static string $ROUTE='/colegio_relaciones/estructura/alumno_materia_api';
	
	function __construct() {
		$this->alumno_materiaLogicI = new AlumnoMateriaLogic();
		
		$this->alumno_materia1 = new AlumnoMateria();
		
		$this->alumno_materias = array();		
		
		$this->pagination1 = new Pagination();		
		$this->alumno_materiaReturnView = new AlumnoMateriaReturnView();
		
		/*FKs*/
		$this->alumno_materiaFKReturnView = new AlumnoMateriaFKReturnView();				
		
		/*Log::channel('stderr')->info('Controller Created');*/
    }
	
	public function setReturnView(TipoAccionEnum $tipo_accion_enum1) : void {
		/*
		$this->alumno_materias = $this->alumno_materiaLogicI->alumno_materias;
		$this->alumno_materia1 = $this->alumno_materiaLogicI->alumno_materia1;				
		*/
		
		$this->alumno_materiaReturnView->setReturnView($tipo_accion_enum1,$this->alumno_materia1,$this->alumno_materias);		
	}
	
	public function getIndex(GetAllRequest $request) : JsonResponse {		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$this->pagination1 = new Pagination();
			$this->pagination1->skip = intval($request->input('pagination.skip'));
			$this->pagination1->limit = intval($request->input('pagination.limit'));
			
			$this->alumno_materias = $this->alumno_materiaLogicI->getIndex($this->pagination1);
					
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);			
			$response_json = response()->json($this->alumno_materiaReturnView,Response::HTTP_OK);
		
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
			
			$this->alumno_materias = $this->alumno_materiaLogicI->getTodos($this->pagination1);			
			
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);				
			$response_json = response()->json($this->alumno_materiaReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function getSeleccionar(GetIdRequest $request) : JsonResponse {   		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$id = $request->input('id');			
			$this->alumno_materia1 = $this->alumno_materiaLogicI->getSeleccionar($id);
			
			$this->setReturnView(TipoAccionEnum::SELECCIONAR);
			$response_json = response()->json($this->alumno_materiaReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}			
	
	public function nuevo(AlumnoMateriaCreateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			
			$values = $request->input('alumno_materia');			
			$this->alumno_materia1 = $this->alumno_materiaLogicI->nuevo($values);
			
			$this->setReturnView(TipoAccionEnum::NUEVO);			
			$response_json = response()->json($this->alumno_materiaReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function actualizar(AlumnoMateriaUpdateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			$id = $request->input('alumno_materia.id');
			$values = $request->input('alumno_materia');			
			$updated = $this->alumno_materiaLogicI->actualizar($id,$values);
			
			$this->setReturnView(TipoAccionEnum::ACTUALIZAR);					
			$response_json = response()->json($this->alumno_materiaReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function eliminar(GetIdRequest $request) : JsonResponse {
		
		$is_validated = $request->validated();
		
		if($is_validated) {	
			
			$id = $request->input('id');			
			$deleted = $this->alumno_materiaLogicI->eliminar($id);
			
			$this->setReturnView(TipoAccionEnum::ELIMINAR);					
			$response_json = response()->json($this->alumno_materiaReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function nuevos(Request $request) : JsonResponse {
		$news_alumno_materias = $request->input('news_alumno_materias');
		
		$this->alumno_materiaLogicI->nuevos($news_alumno_materias);
				
		$this->setReturnView(TipoAccionEnum::NUEVO);
				
		return response()->json($this->alumno_materiaReturnView,Response::HTTP_OK);
	}
	
	public function eliminars(Request $request) : JsonResponse {
		$ids_deletes_alumno_materias = $request->input('ids_deletes_alumno_materias');
		
		$this->alumno_materiaLogicI->eliminars($ids_deletes_alumno_materias);
				
		$this->setReturnView(TipoAccionEnum::ELIMINAR);
				
		return response()->json($this->alumno_materiaReturnView,Response::HTTP_OK);
	}
	
	public function actualizars(Request $request) : JsonResponse {
		$updates_alumno_materias = $request->input('updates_alumno_materias');
		$updates_columnas = $request->input('updates_columnas');
		
		$this->alumno_materiaLogicI->actualizars($updates_alumno_materias,$updates_columnas);
		
		$this->setReturnView(TipoAccionEnum::ACTUALIZAR);
				
		return response()->json($this->alumno_materiaReturnView,Response::HTTP_OK);
	}
	
	public function guardarCambios(Request $request) : JsonResponse {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		$news_alumno_materias = $request->input('news_alumno_materias');
		/*--- Deletes ---*/
		$ids_deletes_alumno_materias = $request->input('ids_deletes_alumno_materias');
		/*--- Updates ---*/
		$updates_alumno_materias = $request->input('updates_alumno_materias');
		$updates_columnas = $request->input('updates_columnas');
		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/		
		/*--- Updates ---*/
		
		$this->alumno_materiaLogicI->guardarCambios($news_alumno_materias,$ids_deletes_alumno_materias,$updates_alumno_materias,$updates_columnas);
				
		$this->setReturnView(TipoAccionEnum::GUARDAR_CAMBIOS);
				
		return response()->json($this->alumno_materiaReturnView,Response::HTTP_OK);
	}
	
	/*FKs*/
	
	public function getFks(Request $request) : JsonResponse {
		
		$this->alumno_materiaLogicI->getFks();
		
		$this->alumno_materiaFKReturnView->alumnosFK = $this->alumno_materiaLogicI->alumnosFK;
		$this->alumno_materiaFKReturnView->materiasFK = $this->alumno_materiaLogicI->materiasFK;
						
		return response()->json($this->alumno_materiaFKReturnView,Response::HTTP_OK);
	}
	
}
