<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Lib\Financiero\Contrato\Infrastructure\Controller\ContratoController;

use App\Lib\Base\Util\Constantes;


Route::prefix(ContratoController::$ROUTE)->group(function () {
	
	Route::post(Constantes::$DEFAULT,[ContratoController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$INDEX,[ContratoController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$TODOS,[ContratoController::class,Constantes::$GET_TODOS]);	
	
	Route::post(Constantes::$BUSCAR,[ContratoController::class,Constantes::$GET_BUSCAR]);	
	Route::post(Constantes::$SELECCIONAR, [ContratoController::class, Constantes::$GET_SELECCIONAR]);
	
	Route::post(Constantes::$NUEVO,[ContratoController::class,Constantes::$SNUEVO]);
	Route::put(Constantes::$ACTUALIZAR,[ContratoController::class,Constantes::$SACTUALIZAR]);
	Route::delete(Constantes::$ELIMINAR,[ContratoController::class,Constantes::$SELIMINAR]);
	
	Route::post(Constantes::$NUEVO.'s',[ContratoController::class,Constantes::$SNUEVOS]);
	Route::put(Constantes::$ACTUALIZAR.'s',[ContratoController::class,Constantes::$SACTUALIZARS]);		
	Route::delete(Constantes::$ELIMINAR.'s',[ContratoController::class,Constantes::$SELIMINARS]);
	Route::post(Constantes::$GUARDAR_CAMBIOS,[ContratoController::class,Constantes::$SGUARDAR_CAMBIOS]);
	
	Route::post(Constantes::$GET_FKS,[ContratoController::class,Constantes::$SGET_FKS]);
	
});
