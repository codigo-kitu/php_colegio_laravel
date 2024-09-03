<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Lib\Estructura\Alumno\Infrastructure\Controller\AlumnoController;

use App\Lib\Base\Util\Constantes;


Route::prefix(AlumnoController::$ROUTE)->group(function () {
	
	Route::post(Constantes::$DEFAULT,[AlumnoController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$INDEX,[AlumnoController::class,Constantes::$GET_INDEX]);
	Route::post(Constantes::$TODOS,[AlumnoController::class,Constantes::$GET_TODOS]);	
	
	Route::post(Constantes::$BUSCAR,[AlumnoController::class,Constantes::$GET_BUSCAR]);	
	Route::post(Constantes::$SELECCIONAR, [AlumnoController::class, Constantes::$GET_SELECCIONAR]);
	
	Route::post(Constantes::$NUEVO,[AlumnoController::class,Constantes::$SNUEVO]);
	Route::put(Constantes::$ACTUALIZAR,[AlumnoController::class,Constantes::$SACTUALIZAR]);
	Route::delete(Constantes::$ELIMINAR,[AlumnoController::class,Constantes::$SELIMINAR]);
	
	Route::post(Constantes::$NUEVO.'s',[AlumnoController::class,Constantes::$SNUEVOS]);
	Route::put(Constantes::$ACTUALIZAR.'s',[AlumnoController::class,Constantes::$SACTUALIZARS]);		
	Route::delete(Constantes::$ELIMINAR.'s',[AlumnoController::class,Constantes::$SELIMINARS]);
	Route::post(Constantes::$GUARDAR_CAMBIOS,[AlumnoController::class,Constantes::$SGUARDAR_CAMBIOS]);
	
	
	Route::post(Constantes::$TODOS_RELACIONES,[AlumnoController::class,Constantes::$GET_TODOS_RELACIONES]);
	Route::post(Constantes::$SELECCIONAR_RELACIONES, [AlumnoController::class, Constantes::$GET_SELECCIONAR_RELACIONES]);	
});
