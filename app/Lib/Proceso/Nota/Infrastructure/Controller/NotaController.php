<?php declare(strict_types = 1);

namespace App\Lib\Proceso\Nota\Infrastructure\Controller;

use App\Http\Controllers\Controller;

use App\Lib\Base\Infrastructure\Request\GetAllRequest;
use App\Lib\Base\Infrastructure\Request\GetIdRequest;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

use App\Lib\Proceso\Nota\Infrastructure\Util\Request\NotaCreateRequest;
use App\Lib\Proceso\Nota\Infrastructure\Util\Request\NotaUpdateRequest;

/*use Illuminate\Database\Eloquent\Collection;*/

use App\Lib\Base\Application\Logic\Pagination;
use App\Lib\Base\Util\TipoAccionEnum;

use App\Lib\Proceso\Nota\Domain\Entity\Nota;

use App\Lib\Proceso\Nota\Application\Logic\NotaLogicI;
use App\Lib\Proceso\Nota\Application\Logic\NotaLogic;

/*FKs*/
use App\Lib\Estructura\Alumno\Domain\Entity\Alumno;
use App\Lib\Estructura\Materia\Domain\Entity\Materia;
use App\Lib\Estructura\Docente\Domain\Entity\Docente;
		

use App\Lib\Proceso\Nota\Infrastructure\Util\Return\NotaReturnView;

/*FKs*/
use App\Lib\Proceso\Nota\Infrastructure\Util\Return\NotaFKReturnView;	

class NotaController extends Controller {
		
	public NotaLogicI $notaLogicI;
	
	public Nota $nota1;
	public array $notas;
	
	public Pagination $pagination1;
	public bool $is_validated=false;
	public string $response_json='';
	
	public NotaReturnView $notaReturnView;
	
	/*FKs*/
	public NotaFKReturnView $notaFKReturnView;		
	
	public static string $ROUTE='/colegio_relaciones/proceso/nota_api';
	
	function __construct() {
		$this->notaLogicI = new NotaLogic();
		
		$this->nota1 = new Nota();
		
		$this->notas = array();		
		
		$this->pagination1 = new Pagination();		
		$this->notaReturnView = new NotaReturnView();
		
		/*FKs*/
		$this->notaFKReturnView = new NotaFKReturnView();				
		
		/*Log::channel('stderr')->info('Controller Created');*/
    }
	
	public function setReturnView(TipoAccionEnum $tipo_accion_enum1) : void {
		/*
		$this->notas = $this->notaLogicI->notas;
		$this->nota1 = $this->notaLogicI->nota1;				
		*/
		
		$this->notaReturnView->setReturnView($tipo_accion_enum1,$this->nota1,$this->notas);		
	}
	
	public function getIndex(GetAllRequest $request) : JsonResponse {		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$this->pagination1 = new Pagination();
			$this->pagination1->skip = intval($request->input('pagination.skip'));
			$this->pagination1->limit = intval($request->input('pagination.limit'));
			
			$this->notas = $this->notaLogicI->getIndex($this->pagination1);
					
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);			
			$response_json = response()->json($this->notaReturnView,Response::HTTP_OK);
		
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
			
			$this->notas = $this->notaLogicI->getTodos($this->pagination1);			
			
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);				
			$response_json = response()->json($this->notaReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function getSeleccionar(GetIdRequest $request) : JsonResponse {   		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$id = $request->input('id');			
			$this->nota1 = $this->notaLogicI->getSeleccionar($id);
			
			$this->setReturnView(TipoAccionEnum::SELECCIONAR);
			$response_json = response()->json($this->notaReturnView,Response::HTTP_OK);
			
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}			
	
	public function nuevo(NotaCreateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			
			$values = $request->input('nota');			
			$this->nota1 = $this->notaLogicI->nuevo($values);
			
			$this->setReturnView(TipoAccionEnum::NUEVO);			
			$response_json = response()->json($this->notaReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function actualizar(NotaUpdateRequest $request) : JsonResponse {
		$is_validated = $request->validated();
		
		if($is_validated) {
			$id = $request->input('nota.id');
			$values = $request->input('nota');			
			$updated = $this->notaLogicI->actualizar($id,$values);
			
			$this->setReturnView(TipoAccionEnum::ACTUALIZAR);					
			$response_json = response()->json($this->notaReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function eliminar(GetIdRequest $request) : JsonResponse {
		
		$is_validated = $request->validated();
		
		if($is_validated) {	
			
			$id = $request->input('id');			
			$deleted = $this->notaLogicI->eliminar($id);
			
			$this->setReturnView(TipoAccionEnum::ELIMINAR);					
			$response_json = response()->json($this->notaReturnView,Response::HTTP_OK);
		
		} else {
			$response_json = $request->messages();
		}
		
		return $response_json;
	}
	
	public function nuevos(Request $request) : JsonResponse {
		$news_notas = $request->input('news_notas');
		
		$this->notaLogicI->nuevos($news_notas);
				
		$this->setReturnView(TipoAccionEnum::NUEVO);
				
		return response()->json($this->notaReturnView,Response::HTTP_OK);
	}
	
	public function eliminars(Request $request) : JsonResponse {
		$ids_deletes_notas = $request->input('ids_deletes_notas');
		
		$this->notaLogicI->eliminars($ids_deletes_notas);
				
		$this->setReturnView(TipoAccionEnum::ELIMINAR);
				
		return response()->json($this->notaReturnView,Response::HTTP_OK);
	}
	
	public function actualizars(Request $request) : JsonResponse {
		$updates_notas = $request->input('updates_notas');
		$updates_columnas = $request->input('updates_columnas');
		
		$this->notaLogicI->actualizars($updates_notas,$updates_columnas);
		
		$this->setReturnView(TipoAccionEnum::ACTUALIZAR);
				
		return response()->json($this->notaReturnView,Response::HTTP_OK);
	}
	
	public function guardarCambios(Request $request) : JsonResponse {
		
		/*--------------------------- PARAMETROS -------------------*/
		
		/*--- Inserts ---*/
		$news_notas = $request->input('news_notas');
		/*--- Deletes ---*/
		$ids_deletes_notas = $request->input('ids_deletes_notas');
		/*--- Updates ---*/
		$updates_notas = $request->input('updates_notas');
		$updates_columnas = $request->input('updates_columnas');
		
		
		/*--------------------------- ACCIONES -------------------*/
		
		/*--- Inserts ---*/
		/*--- Deletes ---*/		
		/*--- Updates ---*/
		
		$this->notaLogicI->guardarCambios($news_notas,$ids_deletes_notas,$updates_notas,$updates_columnas);
				
		$this->setReturnView(TipoAccionEnum::GUARDAR_CAMBIOS);
				
		return response()->json($this->notaReturnView,Response::HTTP_OK);
	}
	
	/*FKs*/
	
	public function getFks(Request $request) : JsonResponse {
		
		$this->notaLogicI->getFks();
		
		$this->notaFKReturnView->alumnosFK = $this->notaLogicI->alumnosFK;
		$this->notaFKReturnView->materiasFK = $this->notaLogicI->materiasFK;
		$this->notaFKReturnView->docentesFK = $this->notaLogicI->docentesFK;
						
		return response()->json($this->notaFKReturnView,Response::HTTP_OK);
	}
	
}
