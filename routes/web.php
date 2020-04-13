<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/documentacion/ordenes-productos', function () { 
    return view('documentacion.ordenes.ordenesProductos');
})->name('documentacion.ordenesProductos');

Route::get('/documentacion/crear-ordenes', function () { 
    return view('documentacion.ordenes.crearOrdenes');
})->name('documentacion.ordenesProductos');

Route::get('/documentacion/blade/estructuras-de-control', function () { 
    return view('documentacion.blade.funciones');
})->name('documentacion.blade.funciones');

Route::get('/documentacion/seguridad/csrf', function () { 
    return view('documentacion.common.csrftoken');
})->name('documentacion.csrf-token');



