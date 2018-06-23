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

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
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

Auth::routes();
