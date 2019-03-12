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
    return view('Entidad/index');
});
Route::get('/entidades', 'EntidadController@index');
Route::resource('/entidades', 'EntidadController');
Route::post('/entidades', 'EntidadController@store');

/*Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entidades', 'EntidadController@index');
Route::get('/entidades/{id}', 'EntidadController@show');
Route::post('/entidades', 'EntidadController@store');
Route::patch('/entidades/{id}', 'EntidadController@update');
Route::delete('/entidades/{id}', 'EntidadController@destroy');*/

