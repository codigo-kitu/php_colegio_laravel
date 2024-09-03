<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Lib\Proceso\Matricula\Infrastructure\Controller\MatriculaController;

use App\Lib\Base\Util\Constantes;


Route::prefix(MatriculaController::$ROUTE)->group(function () {
	
	Route::post(Constantes::$DEFAULT,[MatriculaController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$INDEX,[MatriculaController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$TODOS,[MatriculaController::class,Constantes::$GET_TODOS]);	
	
	Route::post(Constantes::$BUSCAR,[MatriculaController::class,Constantes::$GET_BUSCAR]);	
	Route::post(Constantes::$SELECCIONAR, [MatriculaController::class, Constantes::$GET_SELECCIONAR]);
	
	Route::post(Constantes::$NUEVO,[MatriculaController::class,Constantes::$SNUEVO]);
	Route::put(Constantes::$ACTUALIZAR,[MatriculaController::class,Constantes::$SACTUALIZAR]);
	Route::delete(Constantes::$ELIMINAR,[MatriculaController::class,Constantes::$SELIMINAR]);
	
	Route::post(Constantes::$NUEVO.'s',[MatriculaController::class,Constantes::$SNUEVOS]);
	Route::put(Constantes::$ACTUALIZAR.'s',[MatriculaController::class,Constantes::$SACTUALIZARS]);		
	Route::delete(Constantes::$ELIMINAR.'s',[MatriculaController::class,Constantes::$SELIMINARS]);
	Route::post(Constantes::$GUARDAR_CAMBIOS,[MatriculaController::class,Constantes::$SGUARDAR_CAMBIOS]);
	
	Route::post(Constantes::$GET_FKS,[MatriculaController::class,Constantes::$SGET_FKS]);
	
});
