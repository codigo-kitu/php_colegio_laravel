<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Lib\Estructura\Materia\Infrastructure\Controller\MateriaFullController;

use App\Lib\Base\Util\Constantes;


Route::prefix(MateriaFullController::$ROUTE)
	//->middleware(['auth:sanctum'])
	->group(function () {
	
	Route::get(Constantes::$DEFAULT,[MateriaFullController::class,Constantes::$GET_INDEX]);
	Route::get(Constantes::$INDEX,[MateriaFullController::class,Constantes::$GET_INDEX]);
	Route::get(Constantes::$TODOS,[MateriaFullController::class,Constantes::$GET_TODOS]);	
	
	Route::post(Constantes::$BUSCAR,[MateriaFullController::class,Constantes::$GET_BUSCAR]);	
	Route::post(Constantes::$SELECCIONAR, [MateriaFullController::class, Constantes::$GET_SELECCIONAR]);
	
	Route::post(Constantes::$NUEVO,[MateriaFullController::class,Constantes::$SNUEVO]);
	Route::put(Constantes::$ACTUALIZAR,[MateriaFullController::class,Constantes::$SACTUALIZAR]);
	Route::delete(Constantes::$ELIMINAR,[MateriaFullController::class,Constantes::$SELIMINAR]);
	
	Route::post(Constantes::$NUEVO.'s',[MateriaFullController::class,Constantes::$SNUEVOS]);
	Route::put(Constantes::$ACTUALIZAR.'s',[MateriaFullController::class,Constantes::$SACTUALIZARS]);		
	Route::delete(Constantes::$ELIMINAR.'s',[MateriaFullController::class,Constantes::$SELIMINARS]);
	Route::post(Constantes::$GUARDAR_CAMBIOS,[MateriaFullController::class,Constantes::$SGUARDAR_CAMBIOS]);
	
	
	Route::post(Constantes::$TODOS_RELACIONES,[MateriaFullController::class,Constantes::$GET_TODOS_RELACIONES]);
	Route::post(Constantes::$SELECCIONAR_RELACIONES, [MateriaFullController::class, Constantes::$GET_SELECCIONAR_RELACIONES]);	
});
