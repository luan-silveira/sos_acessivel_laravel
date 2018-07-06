<?php

use App\Model\Admin\TipoOcorrencia;

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

//Route::get('/', 'Admin\DashboardController@index');



Route::group(['middleware' => ['auth']], function(){
    
    Route::get('/', 'Admin\AdminController@index')->middleware('auth');
    
    Route::get('ocorrencias', 'OcorrenciaController@index')->name('ocorrencias.index');
    Route::post('ocorrencias', 'OcorrenciaController@store')->name('ocorrencias.store');
    Route::get('ocorrencias/nova', 'OcorrenciaController@create')->name('ocorrencias.nova');
    Route::get('ocorrencias/ajax/{id_classificacao_ocorrencia}', function($id){
            $tipos = TipoOcorrencia::where('id_classificacao_ocorrencia', '=', $id)->get();
            return $tipos;
        });
    Route::get('ocorrencias/status/{status}', 'OcorrenciaController@filtroStatus');
    Route::get('ocorrencias/{id_ocorrencia}', 'OcorrenciaController@detalhes')->name('ocorrencias.detalhes');
    Route::get('ocorrencias/{id_ocorrencia}/atendimento', 'OcorrenciaController@atenderOcorrencia')->name('ocorrencias.atendimento');
    Route::resource('atendimentos', 'AtendimentoController')->only(['index', 'show', 'store']);
    Route::get('usuario', 'UserController@edit')->name('usuario.edit');
    Route::put('usuario', 'UserController@update')->name('usuario.update');
    Route::resource('atendimentos', 'AtendimentoController')->only(['index', 'store']);
    Route::get('atendimentos/status/{status}', 'AtendimentoController@filtroStatus');
});

Auth::routes();
