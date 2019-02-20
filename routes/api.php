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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/teste', function (Request $request) {
    return App\User::first();
});

Route::group(['namespace' => 'Api', 'middleware' => ['api']], function(){
    Route::post('paciente/create', 'PacienteController@createPacienteApi');
    Route::get('/ocorrencia/{id_ocorrencia}', 'OcorrenciaController@detalhes');
});
