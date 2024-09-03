<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Lib\Estructura\Docente\Infrastructure\Controller\DocenteController;

use App\Lib\Base\Util\Constantes;


Route::prefix(DocenteController::$ROUTE)->group(function () {
	
	Route::post(Constantes::$DEFAULT,[DocenteController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$INDEX,[DocenteController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$TODOS,[DocenteController::class,Constantes::$GET_TODOS]);	
	
	Route::post(Constantes::$BUSCAR,[DocenteController::class,Constantes::$GET_BUSCAR]);	
	Route::post(Constantes::$SELECCIONAR, [DocenteController::class, Constantes::$GET_SELECCIONAR]);
	
	Route::post(Constantes::$NUEVO,[DocenteController::class,Constantes::$SNUEVO]);
	Route::put(Constantes::$ACTUALIZAR,[DocenteController::class,Constantes::$SACTUALIZAR]);
	Route::delete(Constantes::$ELIMINAR,[DocenteController::class,Constantes::$SELIMINAR]);
	
	Route::post(Constantes::$NUEVO.'s',[DocenteController::class,Constantes::$SNUEVOS]);
	Route::put(Constantes::$ACTUALIZAR.'s',[DocenteController::class,Constantes::$SACTUALIZARS]);		
	Route::delete(Constantes::$ELIMINAR.'s',[DocenteController::class,Constantes::$SELIMINARS]);
	Route::post(Constantes::$GUARDAR_CAMBIOS,[DocenteController::class,Constantes::$SGUARDAR_CAMBIOS]);
	
	
	Route::post(Constantes::$TODOS_RELACIONES,[DocenteController::class,Constantes::$GET_TODOS_RELACIONES]);
	Route::post(Constantes::$SELECCIONAR_RELACIONES, [DocenteController::class, Constantes::$GET_SELECCIONAR_RELACIONES]);	
});
