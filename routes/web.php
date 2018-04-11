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
    return view('inicio');

});
Route::get('/desaparecido/edad/{fecha_nacimiento}', 'DesaparecidoController@getEdad');
Route::post('/desaparecido/getpersona', 'DesaparecidoController@getPersona')
	->name('desaparecido.getpersona');
Route::resource('/desaparecido','DesaparecidoController');

Route::resource('domicilio','DomiciliosController');
Route::get('codigos/{id}', 'DomiciliosController@getCodigos');
Route::get('municipio/{id}', 'DomiciliosController@getMunicipios');
Route::get('localidades/{id}', 'DomiciliosController@getLocalidades');
Route::get('colonias2/{id}', 'DomiciliosController@getColonias2');
Route::get('colonias/{id}', 'DomiciliosController@getColonias');
Route::get('codigos2/{id}', 'DomiciliosController@getCodigos2');




