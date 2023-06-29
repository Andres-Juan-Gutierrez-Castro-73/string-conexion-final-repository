<?php

use App\Http\Controllers\AprendiceController;
use App\Http\Controllers\CadenaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\PhoneController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//CREAMOS LAS RUTAS A LOS CONTROLADORES QUE SE HAN GENERADO CON LA LIBRERIA IBEX
Route::resource('cadenas', CadenaController::class);
Route::resource('programas', ProgramaController::class);
Route::resource('equipos', EquipoController::class);
Route::resource('proyectos', ProyectoController::class);
Route::resource('aprendices', AprendiceController::class);

//RUTAS DEL ENVIO DE MENSAJES POR WHATSAPP
Route::get('/ayuda', 'PhoneController@show');
Route::post('/ayuda', 'PhoneController@storePhoneNumber');
Route::post('/ayuda/mensaje', 'PhoneController@sendCustomMessage');