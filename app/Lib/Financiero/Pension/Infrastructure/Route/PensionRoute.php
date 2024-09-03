<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Lib\Financiero\Pension\Infrastructure\Controller\PensionController;

use App\Lib\Base\Util\Constantes;


Route::prefix(PensionController::$ROUTE)->group(function () {
	
	Route::post(Constantes::$DEFAULT,[PensionController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$INDEX,[PensionController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$TODOS,[PensionController::class,Constantes::$GET_TODOS]);	
	
	Route::post(Constantes::$BUSCAR,[PensionController::class,Constantes::$GET_BUSCAR]);	
	Route::post(Constantes::$SELECCIONAR, [PensionController::class, Constantes::$GET_SELECCIONAR]);
	
	Route::post(Constantes::$NUEVO,[PensionController::class,Constantes::$SNUEVO]);
	Route::put(Constantes::$ACTUALIZAR,[PensionController::class,Constantes::$SACTUALIZAR]);
	Route::delete(Constantes::$ELIMINAR,[PensionController::class,Constantes::$SELIMINAR]);
	
	Route::post(Constantes::$NUEVO.'s',[PensionController::class,Constantes::$SNUEVOS]);
	Route::put(Constantes::$ACTUALIZAR.'s',[PensionController::class,Constantes::$SACTUALIZARS]);		
	Route::delete(Constantes::$ELIMINAR.'s',[PensionController::class,Constantes::$SELIMINARS]);
	Route::post(Constantes::$GUARDAR_CAMBIOS,[PensionController::class,Constantes::$SGUARDAR_CAMBIOS]);
	
	Route::post(Constantes::$GET_FKS,[PensionController::class,Constantes::$SGET_FKS]);
	
});
