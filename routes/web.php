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

Route::get('about', function () {
    $empresa = "MiskiLingo";
    return view('about', ['empresa' => $empresa ]);
});

Route::get('bienvenido', function () {
    return view('bienvenido');
});

Route::get('contacto', function () {
    return view('contacto');
});

Route::get('elementos', function () {
    return view('elementos');
});

Route::get('generico', function () {
    return view('generico');
});
