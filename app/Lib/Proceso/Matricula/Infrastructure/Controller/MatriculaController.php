<?php declare(strict_types = 1);

namespace App\Lib\Proceso\Matricula\Infrastructure\Controller;

use App\Http\Controllers\Controller;

use App\Lib\Base\Infrastructure\Request\GetAllRequest;
use App\Lib\Base\Infrastructure\Request\GetIdRequest;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

use App\Lib\Proceso\Matricula\Infrastructure\Util\Request\MatriculaCreateRequest;
use App\Lib\Proceso\Matricula\Infrastructure\Util\Request\MatriculaUpdateRequest;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Proceso\Matricula\Domain\Entity\Matricula;

use App\Lib\Proceso\Matricula\Application\Logic\MatriculaLogicI;
use App\Lib\Proceso\Matricula\Application\Logic\MatriculaLogic;

/*FKs*/
use App\Lib\Estructura\Alumno\Domain\Entity\Alumno;
		

use App\Lib\Proceso\Matricula\Infrastructure\Util\Return\MatriculaReturnView;

/*FKs*/
use App\Lib\Proceso\Matricula\Infrastructure\Util\Return\MatriculaFKReturnView;	

class MatriculaController extends Controller {
		
	public MatriculaLogicI $matriculaLogicI;
	
	public Matricula $matricula1;
	public array $matriculas;
	
	public Pagination $pagination1;
	public bool $is_validated=false;
	public string $response_json='';
	
	public MatriculaReturnView $matriculaReturnView;
	
	/*FKs*/
	public MatriculaFKReturnView $matriculaFKReturnView;		
	
	public static string $ROUTE='/colegio_relaciones/proceso/matricula_api';
	
	function __construct() {
		$this->matriculaLogicI = new MatriculaLogic();
		
		$this->matricula1 = new Matricula();
		
		$this->matriculas = array();		
		
		$this->pagination1 = new Pagination();		
		$this->matriculaReturnView = new MatriculaReturnView();
		
		/*FKs*/
		$this->matriculaFKReturnView = new MatriculaFKReturnView();				
		
		/*Log::channel('stderr')->info('Controller Created');*/
    }
	
	public function setReturnView(TipoAccionEnum $tipo_accion_enum1) : void {
		/*
		$this->matriculas = $this->matriculaLogicI->matriculas;
		$this->matricula1 = $this->matriculaLogicI->matricula1;				
		*/
		
		$this->matriculaReturnView->setReturnView($tipo_accion_enum1,$this->matricula1,$this->matriculas);		
	}
	
	public function getIndex(GetAllRequest $request) : JsonResponse {		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$this->pagination1 = new Pagination();
			$this->pagination1->skip = intval($request->input('pagination.skip'));
			$this->pagination1->limit = intval($request->input('pagination.limit'));
			
			$this->matriculas = $this->matriculaLogicI->getIndex($this->pagination1);
					
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);			
			$response_json = response()->json($this->matriculaReturnView,Response::HTTP_OK);
		
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
			
			$this->matriculas = $this->matriculaLogicI->getTodos($this->pagination1);			
			
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);				
			$response_json = response()->json($this->matriculaReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function getSeleccionar(GetIdRequest $request) : JsonResponse {   		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$id = $request->input('id');			
			$this->matricula1 = $this->matriculaLogicI->getSeleccionar($id);
			
			$this->setReturnView(TipoAccionEnum::SELECCIONAR);
			$response_json = response()->json($this->matriculaReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}			
	
	public function nuevo(MatriculaCreateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			
			$values = $request->input('matricula');			
			$this->matricula1 = $this->matriculaLogicI->nuevo($values);
			
			$this->setReturnView(TipoAccionEnum::NUEVO);			
			$response_json = response()->json($this->matriculaReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function actualizar(MatriculaUpdateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			$id = $request->input('matricula.id');
			$values = $request->input('matricula');			
			$updated = $this->matriculaLogicI->actualizar($id,$values);
			
			$this->setReturnView(TipoAccionEnum::ACTUALIZAR);					
			$response_json = response()->json($this->matriculaReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function eliminar(GetIdRequest $request) : JsonResponse {
		
		$is_validated = $request->validated();
		
		if($is_validated) {	
			
			$id = $request->input('id');			
			$deleted = $this->matriculaLogicI->eliminar($id);
			
			$this->setReturnView(TipoAccionEnum::ELIMINAR);					
			$response_json = response()->json($this->matriculaReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function nuevos(Request $request) : JsonResponse {
		$news_matriculas = $request->input('news_matriculas');
		
		$this->matriculaLogicI->nuevos($news_matriculas);
				
		$this->setReturnView(TipoAccionEnum::NUEVO);
				
		return response()->json($this->matriculaReturnView,Response::HTTP_OK);
	}
	
	public function eliminars(Request $request) : JsonResponse {
		$ids_deletes_matriculas = $request->input('ids_deletes_matriculas');
		
		$this->matriculaLogicI->eliminars($ids_deletes_matriculas);
				
		$this->setReturnView(TipoAccionEnum::ELIMINAR);
				
		return response()->json($this->matriculaReturnView,Response::HTTP_OK);
	}
	
	public function actualizars(Request $request) : JsonResponse {
		$updates_matriculas = $request->input('updates_matriculas');
		$updates_columnas = $request->input('updates_columnas');
		
		$this->matriculaLogicI->actualizars($updates_matriculas,$updates_columnas);
		
		$this->setReturnView(TipoAccionEnum::ACTUALIZAR);
				
		return response()->json($this->matriculaReturnView,Response::HTTP_OK);
	}
	
	public function guardarCambios(Request $request) : JsonResponse {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		$news_matriculas = $request->input('news_matriculas');
		/*--- Deletes ---*/
		$ids_deletes_matriculas = $request->input('ids_deletes_matriculas');
		/*--- Updates ---*/
		$updates_matriculas = $request->input('updates_matriculas');
		$updates_columnas = $request->input('updates_columnas');
		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/		
		/*--- Updates ---*/
		
		$this->matriculaLogicI->guardarCambios($news_matriculas,$ids_deletes_matriculas,$updates_matriculas,$updates_columnas);
				
		$this->setReturnView(TipoAccionEnum::GUARDAR_CAMBIOS);
				
		return response()->json($this->matriculaReturnView,Response::HTTP_OK);
	}
	
	/*FKs*/
	
	public function getFks(Request $request) : JsonResponse {
		
		$this->matriculaLogicI->getFks();
		
		$this->matriculaFKReturnView->alumnosFK = $this->matriculaLogicI->alumnosFK;
						
		return response()->json($this->matriculaFKReturnView,Response::HTTP_OK);
	}
	
}
