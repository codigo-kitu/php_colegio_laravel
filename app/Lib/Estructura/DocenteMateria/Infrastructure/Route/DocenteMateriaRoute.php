<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Lib\Estructura\DocenteMateria\Infrastructure\Controller\DocenteMateriaController;

use App\Lib\Base\Util\Constantes;


Route::prefix(DocenteMateriaController::$ROUTE)->group(function () {
	
	Route::post(Constantes::$DEFAULT,[DocenteMateriaController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$INDEX,[DocenteMateriaController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$TODOS,[DocenteMateriaController::class,Constantes::$GET_TODOS]);	
	
	Route::post(Constantes::$BUSCAR,[DocenteMateriaController::class,Constantes::$GET_BUSCAR]);	
	Route::post(Constantes::$SELECCIONAR, [DocenteMateriaController::class, Constantes::$GET_SELECCIONAR]);
	
	Route::post(Constantes::$NUEVO,[DocenteMateriaController::class,Constantes::$SNUEVO]);
	Route::put(Constantes::$ACTUALIZAR,[DocenteMateriaController::class,Constantes::$SACTUALIZAR]);
	Route::delete(Constantes::$ELIMINAR,[DocenteMateriaController::class,Constantes::$SELIMINAR]);
	
	Route::post(Constantes::$NUEVO.'s',[DocenteMateriaController::class,Constantes::$SNUEVOS]);
	Route::put(Constantes::$ACTUALIZAR.'s',[DocenteMateriaController::class,Constantes::$SACTUALIZARS]);		
	Route::delete(Constantes::$ELIMINAR.'s',[DocenteMateriaController::class,Constantes::$SELIMINARS]);
	Route::post(Constantes::$GUARDAR_CAMBIOS,[DocenteMateriaController::class,Constantes::$SGUARDAR_CAMBIOS]);
	
	Route::post(Constantes::$GET_FKS,[DocenteMateriaController::class,Constantes::$SGET_FKS]);
	
});
