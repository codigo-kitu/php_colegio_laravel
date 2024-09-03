<?php declare(strict_types = 1);

namespace App\Lib\Estructura\DocenteMateria\Infrastructure\Controller;

use App\Http\Controllers\Controller;

use App\Lib\Base\Infrastructure\Request\GetAllRequest;
use App\Lib\Base\Infrastructure\Request\GetIdRequest;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

use App\Lib\Estructura\DocenteMateria\Infrastructure\Util\Request\DocenteMateriaCreateRequest;
use App\Lib\Estructura\DocenteMateria\Infrastructure\Util\Request\DocenteMateriaUpdateRequest;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Estructura\DocenteMateria\Domain\Entity\DocenteMateria;

use App\Lib\Estructura\DocenteMateria\Application\Logic\DocenteMateriaLogicI;
use App\Lib\Estructura\DocenteMateria\Application\Logic\DocenteMateriaLogic;

/*FKs*/
use App\Lib\Estructura\Docente\Domain\Entity\Docente;
use App\Lib\Estructura\Materia\Domain\Entity\Materia;
		

use App\Lib\Estructura\DocenteMateria\Infrastructure\Util\Return\DocenteMateriaReturnView;

/*FKs*/
use App\Lib\Estructura\DocenteMateria\Infrastructure\Util\Return\DocenteMateriaFKReturnView;	

class DocenteMateriaController extends Controller {
		
	public DocenteMateriaLogicI $docente_materiaLogicI;
	
	public DocenteMateria $docente_materia1;
	public array $docente_materias;
	
	public Pagination $pagination1;
	public bool $is_validated=false;
	public string $response_json='';
	
	public DocenteMateriaReturnView $docente_materiaReturnView;
	
	/*FKs*/
	public DocenteMateriaFKReturnView $docente_materiaFKReturnView;		
	
	public static string $ROUTE='/colegio_relaciones/estructura/docente_materia_api';
	
	function __construct() {
		$this->docente_materiaLogicI = new DocenteMateriaLogic();
		
		$this->docente_materia1 = new DocenteMateria();
		
		$this->docente_materias = array();		
		
		$this->pagination1 = new Pagination();		
		$this->docente_materiaReturnView = new DocenteMateriaReturnView();
		
		/*FKs*/
		$this->docente_materiaFKReturnView = new DocenteMateriaFKReturnView();				
		
		/*Log::channel('stderr')->info('Controller Created');*/
    }
	
	public function setReturnView(TipoAccionEnum $tipo_accion_enum1) : void {
		/*
		$this->docente_materias = $this->docente_materiaLogicI->docente_materias;
		$this->docente_materia1 = $this->docente_materiaLogicI->docente_materia1;				
		*/
		
		$this->docente_materiaReturnView->setReturnView($tipo_accion_enum1,$this->docente_materia1,$this->docente_materias);		
	}
	
	public function getIndex(GetAllRequest $request) : JsonResponse {		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$this->pagination1 = new Pagination();
			$this->pagination1->skip = intval($request->input('pagination.skip'));
			$this->pagination1->limit = intval($request->input('pagination.limit'));
			
			$this->docente_materias = $this->docente_materiaLogicI->getIndex($this->pagination1);
					
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);			
			$response_json = response()->json($this->docente_materiaReturnView,Response::HTTP_OK);
		
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
			
			$this->docente_materias = $this->docente_materiaLogicI->getTodos($this->pagination1);			
			
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);				
			$response_json = response()->json($this->docente_materiaReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function getSeleccionar(GetIdRequest $request) : JsonResponse {   		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$id = $request->input('id');			
			$this->docente_materia1 = $this->docente_materiaLogicI->getSeleccionar($id);
			
			$this->setReturnView(TipoAccionEnum::SELECCIONAR);
			$response_json = response()->json($this->docente_materiaReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}			
	
	public function nuevo(DocenteMateriaCreateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			
			$values = $request->input('docente_materia');			
			$this->docente_materia1 = $this->docente_materiaLogicI->nuevo($values);
			
			$this->setReturnView(TipoAccionEnum::NUEVO);			
			$response_json = response()->json($this->docente_materiaReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function actualizar(DocenteMateriaUpdateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			$id = $request->input('docente_materia.id');
			$values = $request->input('docente_materia');			
			$updated = $this->docente_materiaLogicI->actualizar($id,$values);
			
			$this->setReturnView(TipoAccionEnum::ACTUALIZAR);					
			$response_json = response()->json($this->docente_materiaReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function eliminar(GetIdRequest $request) : JsonResponse {
		
		$is_validated = $request->validated();
		
		if($is_validated) {	
			
			$id = $request->input('id');			
			$deleted = $this->docente_materiaLogicI->eliminar($id);
			
			$this->setReturnView(TipoAccionEnum::ELIMINAR);					
			$response_json = response()->json($this->docente_materiaReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function nuevos(Request $request) : JsonResponse {
		$news_docente_materias = $request->input('news_docente_materias');
		
		$this->docente_materiaLogicI->nuevos($news_docente_materias);
				
		$this->setReturnView(TipoAccionEnum::NUEVO);
				
		return response()->json($this->docente_materiaReturnView,Response::HTTP_OK);
	}
	
	public function eliminars(Request $request) : JsonResponse {
		$ids_deletes_docente_materias = $request->input('ids_deletes_docente_materias');
		
		$this->docente_materiaLogicI->eliminars($ids_deletes_docente_materias);
				
		$this->setReturnView(TipoAccionEnum::ELIMINAR);
				
		return response()->json($this->docente_materiaReturnView,Response::HTTP_OK);
	}
	
	public function actualizars(Request $request) : JsonResponse {
		$updates_docente_materias = $request->input('updates_docente_materias');
		$updates_columnas = $request->input('updates_columnas');
		
		$this->docente_materiaLogicI->actualizars($updates_docente_materias,$updates_columnas);
		
		$this->setReturnView(TipoAccionEnum::ACTUALIZAR);
				
		return response()->json($this->docente_materiaReturnView,Response::HTTP_OK);
	}
	
	public function guardarCambios(Request $request) : JsonResponse {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		$news_docente_materias = $request->input('news_docente_materias');
		/*--- Deletes ---*/
		$ids_deletes_docente_materias = $request->input('ids_deletes_docente_materias');
		/*--- Updates ---*/
		$updates_docente_materias = $request->input('updates_docente_materias');
		$updates_columnas = $request->input('updates_columnas');
		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/		
		/*--- Updates ---*/
		
		$this->docente_materiaLogicI->guardarCambios($news_docente_materias,$ids_deletes_docente_materias,$updates_docente_materias,$updates_columnas);
				
		$this->setReturnView(TipoAccionEnum::GUARDAR_CAMBIOS);
				
		return response()->json($this->docente_materiaReturnView,Response::HTTP_OK);
	}
	
	/*FKs*/
	
	public function getFks(Request $request) : JsonResponse {
		
		$this->docente_materiaLogicI->getFks();
		
		$this->docente_materiaFKReturnView->docentesFK = $this->docente_materiaLogicI->docentesFK;
		$this->docente_materiaFKReturnView->materiasFK = $this->docente_materiaLogicI->materiasFK;
						
		return response()->json($this->docente_materiaFKReturnView,Response::HTTP_OK);
	}
	
}
