<?php

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

Auth::routes();

Route::resource('entidades', 'EntidadController');
Route::resource('cargos', 'CargoController');
Route::resource('incidencias', 'IncidenciaController');
Route::resource('modulos', 'ModuloController');
Route::resource('sexos', 'SexoController');

