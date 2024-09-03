<?php

use Illuminate\Support\Facades\Route;

require_once dirname(__DIR__,1) . '/app/Lib/Base/Infrastructure/Route/AuthMvcRoute.php';

require_once dirname(__DIR__,1) . '/app/Lib/Estructura/Materia/Infrastructure/Route/MateriaFullRoute.php';
require_once dirname(__DIR__,1) . '/app/Lib/Estructura/Materia/Infrastructure/Route/MateriaMvcRoute.php';

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/materia', function () {
    return view('estructura.materia.application.view.MateriaView', ['title' => 'Materia']);
});
*/