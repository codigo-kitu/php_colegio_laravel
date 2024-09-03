<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Lib\Financiero\Sueldo\Infrastructure\Controller\SueldoController;

use App\Lib\Base\Util\Constantes;


Route::prefix(SueldoController::$ROUTE)->group(function () {
	
	Route::post(Constantes::$DEFAULT,[SueldoController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$INDEX,[SueldoController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$TODOS,[SueldoController::class,Constantes::$GET_TODOS]);	
	
	Route::post(Constantes::$BUSCAR,[SueldoController::class,Constantes::$GET_BUSCAR]);	
	Route::post(Constantes::$SELECCIONAR, [SueldoController::class, Constantes::$GET_SELECCIONAR]);
	
	Route::post(Constantes::$NUEVO,[SueldoController::class,Constantes::$SNUEVO]);
	Route::put(Constantes::$ACTUALIZAR,[SueldoController::class,Constantes::$SACTUALIZAR]);
	Route::delete(Constantes::$ELIMINAR,[SueldoController::class,Constantes::$SELIMINAR]);
	
	Route::post(Constantes::$NUEVO.'s',[SueldoController::class,Constantes::$SNUEVOS]);
	Route::put(Constantes::$ACTUALIZAR.'s',[SueldoController::class,Constantes::$SACTUALIZARS]);		
	Route::delete(Constantes::$ELIMINAR.'s',[SueldoController::class,Constantes::$SELIMINARS]);
	Route::post(Constantes::$GUARDAR_CAMBIOS,[SueldoController::class,Constantes::$SGUARDAR_CAMBIOS]);
	
	Route::post(Constantes::$GET_FKS,[SueldoController::class,Constantes::$SGET_FKS]);
	
});
