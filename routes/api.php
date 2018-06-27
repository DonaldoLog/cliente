<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('personas_no_localizadas/{idCarpeta}', 'ConexionUipjController@getDesaparecidosCarpeta')->name('personas_no_localizadas');
Route::post('login','AuthenticateController@authenticate')->name('login');

Route::middleware(['jwt.auth'])->group(function(){
    Route::post('conexion/uipj', 'ConexionUipjController@resolviendo_peticion');
    Route::get('cedula/{idCedula}', 'CedulaController@show');

});
