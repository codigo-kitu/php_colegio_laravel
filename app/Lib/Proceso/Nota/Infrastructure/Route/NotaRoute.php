<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Lib\Proceso\Nota\Infrastructure\Controller\NotaController;

use App\Lib\Base\Util\Constantes;


Route::prefix(NotaController::$ROUTE)->group(function () {
	
	Route::post(Constantes::$DEFAULT,[NotaController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$INDEX,[NotaController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$TODOS,[NotaController::class,Constantes::$GET_TODOS]);	
	
	Route::post(Constantes::$BUSCAR,[NotaController::class,Constantes::$GET_BUSCAR]);	
	Route::post(Constantes::$SELECCIONAR, [NotaController::class, Constantes::$GET_SELECCIONAR]);
	
	Route::post(Constantes::$NUEVO,[NotaController::class,Constantes::$SNUEVO]);
	Route::put(Constantes::$ACTUALIZAR,[NotaController::class,Constantes::$SACTUALIZAR]);
	Route::delete(Constantes::$ELIMINAR,[NotaController::class,Constantes::$SELIMINAR]);
	
	Route::post(Constantes::$NUEVO.'s',[NotaController::class,Constantes::$SNUEVOS]);
	Route::put(Constantes::$ACTUALIZAR.'s',[NotaController::class,Constantes::$SACTUALIZARS]);		
	Route::delete(Constantes::$ELIMINAR.'s',[NotaController::class,Constantes::$SELIMINARS]);
	Route::post(Constantes::$GUARDAR_CAMBIOS,[NotaController::class,Constantes::$SGUARDAR_CAMBIOS]);
	
	Route::post(Constantes::$GET_FKS,[NotaController::class,Constantes::$SGET_FKS]);
	
});
