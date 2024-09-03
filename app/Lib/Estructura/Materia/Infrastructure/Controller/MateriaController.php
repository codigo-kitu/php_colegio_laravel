<?php declare(strict_types = 1);

namespace App\Lib\Estructura\Materia\Infrastructure\Controller;

use App\Http\Controllers\Controller;

use App\Lib\Base\Infrastructure\Request\GetAllRequest;
use App\Lib\Base\Infrastructure\Request\GetIdRequest;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

use App\Lib\Estructura\Materia\Infrastructure\Util\Request\MateriaCreateRequest;
use App\Lib\Estructura\Materia\Infrastructure\Util\Request\MateriaUpdateRequest;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Estructura\Materia\Domain\Entity\Materia;

use App\Lib\Estructura\Materia\Application\Logic\MateriaLogicI;
use App\Lib\Estructura\Materia\Application\Logic\MateriaLogic;


use App\Lib\Estructura\Materia\Infrastructure\Util\Return\MateriaReturnView;

use Illuminate\Support\Facades\Gate;


class MateriaController extends Controller {
		
	public MateriaLogicI $materiaLogicI;
	
	public Materia $materia1;
	public array $materias;
	
	public Pagination $pagination1;
	public bool $is_validated=false;
	public string $response_json='';
	
	public MateriaReturnView $materiaReturnView;
	
	
	public static string $ROUTE='/colegio_relaciones/estructura/materia_api';
	
	function __construct() {
		$this->materiaLogicI = new MateriaLogic();
		
		$this->materia1 = new Materia();
		
		$this->materias = array();		
		
		$this->pagination1 = new Pagination();		
		$this->materiaReturnView = new MateriaReturnView();
		
		
		/*Log::channel('stderr')->info('Controller Created');*/
    }
	
	public function setReturnView(TipoAccionEnum $tipo_accion_enum1) : void {
		/*
		$this->materias = $this->materiaLogicI->materias;
		$this->materia1 = $this->materiaLogicI->materia1;				
		*/
		
		$this->materiaReturnView->setReturnView($tipo_accion_enum1,$this->materia1,$this->materias);		
	}
	
	public function getIndex(GetAllRequest $request) : JsonResponse {		
		
		Gate::authorize('viewAny', Materia::class);

		$is_validated = $request->validated(); 
		
		if($is_validated) {			
			$this->pagination1 = new Pagination();
			$this->pagination1->skip = intval($request->input('pagination.skip'));
			$this->pagination1->limit = intval($request->input('pagination.limit'));
			
			$this->materias = $this->materiaLogicI->getIndex($this->pagination1);
					
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);			
			$response_json = response()->json($this->materiaReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function getTodos(GetAllRequest $request) : JsonResponse {

		//Gate::authorize('view', MateriaModel::class);

		$is_validated = $request->validated();
		
		if($is_validated) {
			$this->pagination1 = new Pagination();
			$this->pagination1->skip = intval($request->input('pagination.skip'));
			$this->pagination1->limit = intval($request->input('pagination.limit'));
			
			$this->materias = $this->materiaLogicI->getTodos($this->pagination1);			
			
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);				
			$response_json = response()->json($this->materiaReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function getSeleccionar(GetIdRequest $request) : JsonResponse {   		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$id = $request->input('id');			
			$this->materia1 = $this->materiaLogicI->getSeleccionar($id);
			
			$this->setReturnView(TipoAccionEnum::SELECCIONAR);
			$response_json = response()->json($this->materiaReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}			
	
	public function nuevo(MateriaCreateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			
			$values = $request->input('materia');			
			$this->materia1 = $this->materiaLogicI->nuevo($values);
			
			$this->setReturnView(TipoAccionEnum::NUEVO);			
			$response_json = response()->json($this->materiaReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function actualizar(MateriaUpdateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			$id = $request->input('materia.id');
			$values = $request->input('materia');			
			$updated = $this->materiaLogicI->actualizar($id,$values);
			
			$this->setReturnView(TipoAccionEnum::ACTUALIZAR);					
			$response_json = response()->json($this->materiaReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function eliminar(GetIdRequest $request) : JsonResponse {
		
		$is_validated = $request->validated();
		
		if($is_validated) {	
			
			$id = $request->input('id');			
			$deleted = $this->materiaLogicI->eliminar($id);
			
			$this->setReturnView(TipoAccionEnum::ELIMINAR);					
			$response_json = response()->json($this->materiaReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function nuevos(Request $request) : JsonResponse {
		$news_materias = $request->input('news_materias');
		
		$this->materiaLogicI->nuevos($news_materias);
				
		$this->setReturnView(TipoAccionEnum::NUEVO);
				
		return response()->json($this->materiaReturnView,Response::HTTP_OK);
	}
	
	public function eliminars(Request $request) : JsonResponse {
		$ids_deletes_materias = $request->input('ids_deletes_materias');
		
		$this->materiaLogicI->eliminars($ids_deletes_materias);
				
		$this->setReturnView(TipoAccionEnum::ELIMINAR);
				
		return response()->json($this->materiaReturnView,Response::HTTP_OK);
	}
	
	public function actualizars(Request $request) : JsonResponse {
		$updates_materias = $request->input('updates_materias');
		$updates_columnas = $request->input('updates_columnas');
		
		$this->materiaLogicI->actualizars($updates_materias,$updates_columnas);
		
		$this->setReturnView(TipoAccionEnum::ACTUALIZAR);
				
		return response()->json($this->materiaReturnView,Response::HTTP_OK);
	}
	
	public function guardarCambios(Request $request) : JsonResponse {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		$news_materias = $request->input('news_materias');
		/*--- Deletes ---*/
		$ids_deletes_materias = $request->input('ids_deletes_materias');
		/*--- Updates ---*/
		$updates_materias = $request->input('updates_materias');
		$updates_columnas = $request->input('updates_columnas');
		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/		
		/*--- Updates ---*/
		
		$this->materiaLogicI->guardarCambios($news_materias,$ids_deletes_materias,$updates_materias,$updates_columnas);
				
		$this->setReturnView(TipoAccionEnum::GUARDAR_CAMBIOS);
				
		return response()->json($this->materiaReturnView,Response::HTTP_OK);
	}
	
	
	/*----- RELACIONES -----*/
	
	public function getTodosRelaciones(GetAllRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			$this->pagination1 = new Pagination();
			$this->pagination1->skip = intval($request->input('pagination.skip'));
			$this->pagination1->limit = intval($request->input('pagination.limit'));
			
			$this->materias = $this->materiaLogicI->getTodosRelaciones($this->pagination1);										
			
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);					
			$response_json = response()->json($this->materiaReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function getSeleccionarRelaciones(GetIdRequest $request) : JsonResponse {   
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$id = $request->input('id');			
			$this->materia1 = $this->materiaLogicI->getSeleccionarRelaciones($id);
					
			$this->setReturnView(TipoAccionEnum::SELECCIONAR);			
			$response_json = response()->json($this->materiaReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
}
