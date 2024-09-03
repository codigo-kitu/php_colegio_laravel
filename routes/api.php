<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require_once dirname(__DIR__,1) . '/app/Lib/Base/Infrastructure/Route/AuthRoute.php';

require_once dirname(__DIR__,1) . '/app/Lib/Estructura/Alumno/Infrastructure/Route/AlumnoRoute.php';		
require_once dirname(__DIR__,1) . '/app/Lib/Estructura/AlumnoMateria/Infrastructure/Route/AlumnoMateriaRoute.php';		
require_once dirname(__DIR__,1) . '/app/Lib/Financiero/Contrato/Infrastructure/Route/ContratoRoute.php';		
require_once dirname(__DIR__,1) . '/app/Lib/Estructura/Docente/Infrastructure/Route/DocenteRoute.php';		
require_once dirname(__DIR__,1) . '/app/Lib/Estructura/DocenteMateria/Infrastructure/Route/DocenteMateriaRoute.php';		
require_once dirname(__DIR__,1) . '/app/Lib/Estructura/Materia/Infrastructure/Route/MateriaRoute.php';		
require_once dirname(__DIR__,1) . '/app/Lib/Proceso/Matricula/Infrastructure/Route/MatriculaRoute.php';		
require_once dirname(__DIR__,1) . '/app/Lib/Proceso/Nota/Infrastructure/Route/NotaRoute.php';		
require_once dirname(__DIR__,1) . '/app/Lib/Financiero/Pension/Infrastructure/Route/PensionRoute.php';		
require_once dirname(__DIR__,1) . '/app/Lib/Financiero/Sueldo/Infrastructure/Route/SueldoRoute.php';


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/me', function (Request $request) {
    return [1,2,3,4,5];
});