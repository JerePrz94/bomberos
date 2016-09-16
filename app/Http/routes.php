<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('bombero','BomberoController',['except' => ['show']]);

Route::resource('vehiculos','VehiculoController');

Route::resource('materiales','MaterialController');

Route::resource('servicio/tipo','TipoServicioController',['except' => ['create']]);

Route::get('servicio/activo/{id}', 'ServicioController@mostrar')->name('servicio.mostrar');
Route::put('servicio/activo/{id}/edit', 'ServicioController@finalizar')->name('servicio.finalizar');
Route::put('servicio/activo/{id}/salida', 'ServicioController@salida')->name('servicio.salida');
Route::resource('servicio','ServicioController');
