<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//use App\Lib\Estructura\Materia\Infrastructure\Controller\MateriaController;

use App\Lib\Base\Infrastructure\Controller\AuthController;
use App\Lib\Base\Util\Constantes;


/* ===================== AUTHENTICATION ======================= */

Route::prefix(AuthController::$ROUTE)
	->group(function () {

        Route::post('/register_create', [AuthController::class,'registerCreate']);        
        /*
        http://localhost:3000/api/colegio_relaciones/base/login_api/register_create
        {"user":{"name":"bydan","email":"bydan@hotmail.com","password":"123456"}}
        */

        Route::post('/login', [AuthController::class,'login']);

        Route::post('/login2', [AuthController::class,'login2']);


        /*
        http://localhost:3000/api/colegio_relaciones/base/login_api/login
        {"user":{"email":"bydan@hotmail.com","password":"123456"}}
        */

        Route::middleware(['auth:sanctum'])->group(function () {

            Route::post('/logout', [AuthController::class,'logout']);
            /*
            http://localhost:3000/api/colegio_relaciones/base/login_api/logout
            */
        });

        /*
        Route::post('/logout', [AuthController::class,'logout'])
                ->middleware('auth:sanctum');
        */

        Route::get('/test', function (Request $request) {
                return [100,200,300];
        });
});