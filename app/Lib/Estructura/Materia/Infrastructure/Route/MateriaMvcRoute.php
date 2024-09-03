<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Lib\Estructura\Materia\Infrastructure\Controller\MateriaMvcController;

use App\Lib\Base\Util\Constantes;


Route::prefix(MateriaMvcController::$ROUTE)
	->group(function () {
	
		Route::get(Constantes::$DEFAULT,[MateriaMvcController::class,Constantes::$GET_INDEX]);
		Route::get(Constantes::$INDEX,[MateriaMvcController::class,Constantes::$GET_INDEX]);
		Route::post(Constantes::$TODOS,[MateriaMvcController::class,Constantes::$GET_TODOS]);	
		
		Route::post(Constantes::$BUSCAR,[MateriaMvcController::class,Constantes::$GET_BUSCAR]);	
		Route::post(Constantes::$SELECCIONAR, [MateriaMvcController::class, Constantes::$GET_SELECCIONAR]);
		
		Route::post(Constantes::$NUEVO,[MateriaMvcController::class,Constantes::$SNUEVO]);
		Route::post(Constantes::$NUEVO_PREPARAR,[MateriaMvcController::class,Constantes::$SNUEVO_PREPARAR]);
		Route::put(Constantes::$ACTUALIZAR,[MateriaMvcController::class,Constantes::$SACTUALIZAR]);
		Route::delete(Constantes::$ELIMINAR,[MateriaMvcController::class,Constantes::$SELIMINAR]);
		Route::post(Constantes::$CANCELAR,[MateriaMvcController::class,Constantes::$SCANCELAR]);
		
		Route::post(Constantes::$NUEVO.'s',[MateriaMvcController::class,Constantes::$SNUEVOS]);
		Route::put(Constantes::$ACTUALIZAR.'s',[MateriaMvcController::class,Constantes::$SACTUALIZARS]);		
		Route::delete(Constantes::$ELIMINAR.'s',[MateriaMvcController::class,Constantes::$SELIMINARS]);
		Route::post(Constantes::$GUARDAR_CAMBIOS,[MateriaMvcController::class,Constantes::$SGUARDAR_CAMBIOS]);
		
		
		Route::post(Constantes::$TODOS_RELACIONES,[MateriaMvcController::class,Constantes::$GET_TODOS_RELACIONES]);
		Route::post(Constantes::$SELECCIONAR_RELACIONES, [MateriaMvcController::class, Constantes::$GET_SELECCIONAR_RELACIONES]);	
});
