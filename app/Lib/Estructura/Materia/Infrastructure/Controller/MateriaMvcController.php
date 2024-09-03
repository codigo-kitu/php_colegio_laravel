<?php declare(strict_types = 1);

namespace App\Lib\Estructura\Materia\Infrastructure\Controller;

use App\Http\Controllers\Controller;

use App\Lib\Base\Infrastructure\Request\GetAllRequest;
use App\Lib\Base\Infrastructure\Request\GetIdRequest;
use App\Lib\Base\Infrastructure\Request\GetIdTableRequest;

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

class MateriaMvcController extends Controller {
		
	public MateriaLogicI $materiaLogicI;
	
	public Materia $materia1;
	public array $materias;
	
	public Pagination $pagination1;
	public bool $is_validated=false;
	public string $response_json='';
	
	public MateriaReturnView $materiaReturnView;
	
	
	public static string $ROUTE='/colegio_relaciones/estructura/materia';
	public static string $URL_BASE='http://localhost:3000/colegio_relaciones/estructura/materia';
		
	public string $accion_busqueda = 'todos';
	
	public string $display = 'table-row';
	public string $style_id_column ='table-row';
	public string $display_actualizar ='none';
	public string $display_nuevo ='none';
	public int $text_id_aux = -1;
	
	public array $paramsView = array();
	
	function __construct() {
		$this->materiaLogicI = new MateriaLogic();
		
		$this->materia1 = new Materia();
		
		$this->materias = array();		
		
		$this->pagination1 = new Pagination();		
		$this->materiaReturnView = new MateriaReturnView();
		
		
		$this->accion_busqueda = 'todos';
		
		$this->displayForm(false);
		
		/*Log::channel('stderr')->info('Controller Created');*/
    }
	
	public function setReturnView(TipoAccionEnum $tipo_accion_enum1) : void {
		/*
		$this->materias = $this->materiaLogicI->materias;
		$this->materia1 = $this->materiaLogicI->materia1;				
		*/
		
		$this->materiaReturnView->setReturnView($tipo_accion_enum1,$this->materia1,$this->materias);		
	}
	
	public function getIndex() { /*GetAllRequest $request*/
		
		/*Gate::authorize('viewAny', materia::class);*/
				
		$is_validated = true; /*$request->validated();*/
		
		if($is_validated) {			
		
			$this->accion_busqueda = 'todos';
		
			$this->pagination1 = new Pagination();
			
			/*
			$this->pagination1->skip = intval($request->input('pagination.skip'));
			$this->pagination1->limit = intval($request->input('pagination.limit'));
			*/
			
			$this->materias = $this->materiaLogicI->getIndex($this->pagination1);
					
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);			
			
		} else {
			
		}
		
		$this->displayForm(false);
		
		$this->loadParamsView();
		
		return view('Estructura.Materia.Application.View.MateriaView', $this->paramsView);
	}
	
	public function loadParamsView() {
		$this->paramsView = [
			'title' => 'Materia',
			'url_base' => MateriaMvcController ::$URL_BASE,
			'accion_busqueda' => $this->accion_busqueda,
			'text_id_aux' => $this->text_id_aux,
			'display' => $this->display,
			'style_id_column' => $this->style_id_column,
			'display_actualizar' => $this->display_actualizar,
			'display_nuevo' => $this->display_nuevo,
			'materia' => $this->materia1,
			'materia_parametro_view' => $this->materiaReturnView
		];
	}
	
	public function displayForm($con_display) {
		
		if($con_display==true) {
			$this->display = 'table-row';
			$this->style_id_column = 'table-row';
		} else {
			$this->display = 'none';
			$this->style_id_column = 'table-row';
		}
	}
	
	public function getTodos(GetAllRequest $request) {
		
		/*Gate::authorize('viewAny', materia::class);*/
		
		$is_validated = $request->validated();
		
		if($is_validated) {
			
			$this->accion_busqueda = 'todos';
			
			$this->pagination1 = new Pagination();
						
			$this->pagination1->skip = intval($request->input('pagination.skip'));
			$this->pagination1->limit = intval($request->input('pagination.limit'));			
			
			$this->materias = $this->materiaLogicI->getTodos($this->pagination1);			
			
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);				
			
		} else {
			
		}
		
		$this->displayForm(false);
		
		$this->loadParamsView();
		
		return view('Estructura.Materia.Application.Component.MateriaTableComp', $this->paramsView);
	}
	
	public function getSeleccionar(GetIdTableRequest $request) {   		
		
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$id = intval($request->input('id_table'));
			$this->materia1 = $this->materiaLogicI->getSeleccionar($id);
			
			$this->setReturnView(TipoAccionEnum::SELECCIONAR);
			
		} else {
			
		}
		
		$this->display_actualizar = 'table-row';
		$this->display_nuevo = 'none';
		
		$this->displayForm(true);
		
		$this->loadParamsView();
		
		return view('Estructura.Materia.Application.Component.MateriaFormComp', $this->paramsView);
	}			
	
	public function nuevoPreparar() {   		
				
		$this->materia1 = new Materia();
		
		$this->materia1->created_at = '1900-01-01 01:01:01';
		$this->materia1->updated_at = '1900-01-01 01:01:01';
		
		$this->setReturnView(TipoAccionEnum::NUEVO_PREPARAR);
		
		$this->display_actualizar = 'none';
		$this->display_nuevo = 'table-row';
		
		$this->displayForm(true);
		
		$this->loadParamsView();
		
		return view('Estructura.Materia.Application.Component.MateriaFormComp', $this->paramsView);
	}	
	
	public function cancelar() {   		
				
		$this->materia1 = new Materia();
			
		$this->setReturnView(TipoAccionEnum::CANCELAR);
		
		$this->displayForm(false);
		
		$this->loadParamsView();
		
		return view('Estructura.Materia.Application.Component.MateriaFormComp', $this->paramsView);
	}	
	
	public function nuevo(MateriaCreateRequest $request) {
		
		/*Gate::authorize('create', materia::class);*/
		
		$is_validated = $request->validated();
		
		if($is_validated) {
			
			$values = $request->input('materia');			
			$this->materia1 = $this->materiaLogicI->nuevo($values);
			
			$this->setReturnView(TipoAccionEnum::NUEVO);			
			
		} else {
			
		}
		
		$this->displayForm(false);
		
		$this->loadParamsView();
		
		return view('Estructura.Materia.Application.Component.MateriaFormComp', $this->paramsView);
	}
	
	public function actualizar(MateriaUpdateRequest $request) {
		$is_validated = $request->validated();
		
		if($is_validated) {
			$id = $request->input('materia.id');
			$values = $request->input('materia');			
			$updated = $this->materiaLogicI->actualizar($id,$values);
			
			$this->setReturnView(TipoAccionEnum::ACTUALIZAR);					
			
		} else {
			
		}
		
		$this->displayForm(false);
		
		$this->loadParamsView();
		
		return view('Estructura.Materia.Application.Component.MateriaFormComp', $this->paramsView);
	}
	
	public function eliminar(GetIdRequest $request) {
		
		$is_validated = $request->validated();
		
		if($is_validated) {	
			
			$id = intval($request->input('id'));
			
			$deleted = $this->materiaLogicI->eliminar($id);
			
			$this->setReturnView(TipoAccionEnum::ELIMINAR);					
			
		} else {
			
		}
		
		$this->displayForm(false);
		
		$this->loadParamsView();
		
		return view('Estructura.Materia.Application.Component.MateriaFormComp', $this->paramsView);
	}
	
	public function nuevos(Request $request) {
		$news_materias = $request->input('news_materias');
		
		$this->materiaLogicI->nuevos($news_materias);
				
		$this->setReturnView(TipoAccionEnum::NUEVO);
		
		$this->displayForm(false);
		
		$this->loadParamsView();
		
		return view('Estructura.Materia.Application.Component.MateriaTableComp', $this->paramsView);
	}
	
	public function eliminars(Request $request) {
		$ids_deletes_materias = $request->input('ids_deletes_materias');
		
		$this->materiaLogicI->eliminars($ids_deletes_materias);
				
		$this->setReturnView(TipoAccionEnum::ELIMINAR);
		
		$this->displayForm(false);
		
		$this->loadParamsView();
		
		return view('Estructura.Materia.Application.Component.MateriaTableComp', $this->paramsView);
	}
	
	public function actualizars(Request $request) {
		$updates_materias = $request->input('updates_materias');
		$updates_columnas = $request->input('updates_columnas');
		
		$this->materiaLogicI->actualizars($updates_materias,$updates_columnas);
		
		$this->setReturnView(TipoAccionEnum::ACTUALIZAR);
		
		$this->displayForm(false);
		
		$this->loadParamsView();
		
		return view('Estructura.Materia.Application.Component.MateriaTableComp', $this->paramsView);
	}
	
	public function guardarCambios(Request $request) {
		
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
		
		$this->displayForm(false);
		
		$this->loadParamsView();
		
		return view('Estructura.Materia.Application.Component.MateriaTableComp', $this->paramsView);
	}
	
	
	/*----- RELACIONES -----*/
	
	public function getTodosRelaciones(GetAllRequest $request) {
		$is_validated = $request->validated();
		
		if($is_validated) {
			$this->pagination1 = new Pagination();
			$this->pagination1->skip = intval($request->input('pagination.skip'));
			$this->pagination1->limit = intval($request->input('pagination.limit'));
			
			$this->materias = $this->materiaLogicI->getTodosRelaciones($this->pagination1);										
			
			$this->setReturnView(TipoAccionEnum::BUSCAR_TODOS);					
			
		} else {
			
		}
		
		$this->displayForm(false);
		
		$this->loadParamsView();
		
		return view('Estructura.Materia.Application.Component.MateriaTableComp', $this->paramsView);
	}
	
	public function getSeleccionarRelaciones(GetIdRequest $request) {   
		$is_validated = $request->validated();
		
		if($is_validated) {			
			$id = $request->input('id');			
			$this->materia1 = $this->materiaLogicI->getSeleccionarRelaciones($id);
					
			$this->setReturnView(TipoAccionEnum::SELECCIONAR);			
			
		} else {
			
		}
		
		$this->displayForm(true);
		
		$this->loadParamsView();
		
		return view('Estructura.Materia.Application.Component.MateriaFormComp', $this->paramsView);
	}
}
