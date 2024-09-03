<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//use App\Lib\Estructura\Materia\Infrastructure\Controller\MateriaController;

use App\Lib\Base\Infrastructure\Controller\AuthMvcController;
use App\Lib\Base\Util\Constantes;


/* ===================== AUTHENTICATION ======================= */

Route::prefix(AuthMvcController::$ROUTE)
	->group(function () {

        /*http://localhost:3000/colegio_relaciones/base/login/index*/
        Route::get('/index', [AuthMvcController::class,'index']);

        Route::post('/register_create', [AuthMvcController::class,'registerCreate']);        
        /*
        http://localhost:3000/api/colegio_relaciones/base/login_api/register_create
        {"user":{"name":"bydan","email":"bydan@hotmail.com","password":"123456"}}
        */

        /*http://localhost:3000/colegio_relaciones/base/login/login*/
        Route::post('/login', [AuthMvcController::class,'login']);
        /*
        http://localhost:3000/api/colegio_relaciones/base/login_api/login
        {"user":{"email":"bydan@hotmail.com","password":"123456"}}
        */
        
        /*http://localhost:3000/api/colegio_relaciones/base/login_api/logout*/
        Route::middleware(['auth:sanctum'])->group(function () {
            Route::post('/logout', [AuthMvcController::class,'logout']);                                    
        });

        /*
        Route::post('/logout', [AuthMvcController::class,'logout'])
                ->middleware('auth:sanctum');
        */

        /*http://localhost:3000/colegio_relaciones/base/login/login2*/
        Route::get('/login2', [AuthMvcController::class,'login2']);

        /*http://localhost:3000/colegio_relaciones/base/login/test*/
        Route::get('/test', function (Request $request) {

                return view('Base.Application.View.TestView', [
                        'num1' => '100',
                        'num2' => '200',
                        'num3' => '300',
                        'num4' => '400',
                        'num5' => '500']);
        });
});