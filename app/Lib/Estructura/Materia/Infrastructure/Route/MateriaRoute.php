<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Lib\Estructura\Materia\Infrastructure\Controller\MateriaController;

use App\Lib\Base\Util\Constantes;


Route::prefix(MateriaController::$ROUTE)
	//->middleware(['auth:sanctum'])
	->group(function () {
	
	Route::post(Constantes::$DEFAULT,[MateriaController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$INDEX,[MateriaController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$TODOS,[MateriaController::class,Constantes::$GET_TODOS]);	
	
	Route::post(Constantes::$BUSCAR,[MateriaController::class,Constantes::$GET_BUSCAR]);	
	Route::post(Constantes::$SELECCIONAR, [MateriaController::class, Constantes::$GET_SELECCIONAR]);
	
	Route::post(Constantes::$NUEVO,[MateriaController::class,Constantes::$SNUEVO]);
	Route::put(Constantes::$ACTUALIZAR,[MateriaController::class,Constantes::$SACTUALIZAR]);
	Route::delete(Constantes::$ELIMINAR,[MateriaController::class,Constantes::$SELIMINAR]);
	
	Route::post(Constantes::$NUEVO.'s',[MateriaController::class,Constantes::$SNUEVOS]);
	Route::put(Constantes::$ACTUALIZAR.'s',[MateriaController::class,Constantes::$SACTUALIZARS]);		
	Route::delete(Constantes::$ELIMINAR.'s',[MateriaController::class,Constantes::$SELIMINARS]);
	Route::post(Constantes::$GUARDAR_CAMBIOS,[MateriaController::class,Constantes::$SGUARDAR_CAMBIOS]);
	
	
	Route::post(Constantes::$TODOS_RELACIONES,[MateriaController::class,Constantes::$GET_TODOS_RELACIONES]);
	Route::post(Constantes::$SELECCIONAR_RELACIONES, [MateriaController::class, Constantes::$GET_SELECCIONAR_RELACIONES]);	
});
