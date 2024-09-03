<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Lib\Estructura\AlumnoMateria\Infrastructure\Controller\AlumnoMateriaController;

use App\Lib\Base\Util\Constantes;


Route::prefix(AlumnoMateriaController::$ROUTE)->group(function () {
	
	Route::post(Constantes::$DEFAULT,[AlumnoMateriaController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$INDEX,[AlumnoMateriaController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$TODOS,[AlumnoMateriaController::class,Constantes::$GET_TODOS]);	
	
	Route::post(Constantes::$BUSCAR,[AlumnoMateriaController::class,Constantes::$GET_BUSCAR]);	
	Route::post(Constantes::$SELECCIONAR, [AlumnoMateriaController::class, Constantes::$GET_SELECCIONAR]);
	
	Route::post(Constantes::$NUEVO,[AlumnoMateriaController::class,Constantes::$SNUEVO]);
	Route::put(Constantes::$ACTUALIZAR,[AlumnoMateriaController::class,Constantes::$SACTUALIZAR]);
	Route::delete(Constantes::$ELIMINAR,[AlumnoMateriaController::class,Constantes::$SELIMINAR]);
	
	Route::post(Constantes::$NUEVO.'s',[AlumnoMateriaController::class,Constantes::$SNUEVOS]);
	Route::put(Constantes::$ACTUALIZAR.'s',[AlumnoMateriaController::class,Constantes::$SACTUALIZARS]);		
	Route::delete(Constantes::$ELIMINAR.'s',[AlumnoMateriaController::class,Constantes::$SELIMINARS]);
	Route::post(Constantes::$GUARDAR_CAMBIOS,[AlumnoMateriaController::class,Constantes::$SGUARDAR_CAMBIOS]);
	
	Route::post(Constantes::$GET_FKS,[AlumnoMateriaController::class,Constantes::$SGET_FKS]);
	
});
