<?php

use App\Model\Admin\ViaturaModelos;

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

Route::get('/', 'Admin\AdminController@index')->middleware('auth');

Route::group(['middleware' => ['auth']], function(){
    
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin']], function(){
        Route::get('/', 'AdminController@index');
        Route::get('atendentes', 'AtendenteController@index')->name('admin.atendentes');
        Route::resource('classificacoes-ocorrencia', 'ClassificacaoOcorrenciaController');
        Route::resource('usuarios', 'UserController');
        Route::resource('viaturas', 'ViaturasController');
        Route::get('viaturas/ajax/{id_marca}', function($id_marca){
            $modelos = ViaturaModelos::where('id_marca', '=', $id_marca)->get();
            return $modelos;
        });
        Route::get('viaturas/{id_viatura}/ajax/{id_marca}', function($id_viatura, $id_marca){
            $modelos = ViaturaModelos::where('id_marca', '=', $id_marca)->get();
            return $modelos;
        });
        Route::resource('instituicoes-atendimento', 'InstituicaoAtendimentosController');
    });
    
    Route::get('ocorrencias', 'OcorrenciaController@index');
    Route::get('ocorrencias/status/{status}', 'OcorrenciaController@filtroStatus');
    Route::get('ocorrencias/{id_ocorrencia}', 'OcorrenciaController@detalhes')->name('ocorrencias.detalhes');
    Route::get('ocorrencias/{id_ocorrencia}/atendimento', 'OcorrenciaController@atenderOcorrencia')->name('ocorrencias.atendimento');
    Route::post('ocorrencias/{id_ocorrencia}/finalizar', 'OcorrenciaController@finalizarOcorrencia')->name('ocorrencias.finalizar');
    Route::resource('atendimentos', 'AtendimentoController')->only(['index', 'store']);
    Route::get('atendimentos/status/{status}', 'AtendimentoController@filtroStatus');
    Route::get('usuario', 'Admin\UserController@edit')->name('usuario.edit');
    Route::post('usuario', 'Admin\UserController@update')->name('usuario.update');
});

Auth::routes();
