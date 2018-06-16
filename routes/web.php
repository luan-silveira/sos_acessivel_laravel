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

//Route::get('/', 'Admin\DashboardController@index');

Route::get('/', 'Admin\AdminController@index')->middleware('auth');

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::get('/', 'AdminController@index');
    Route::get('atendentes', 'AtendenteController@index')->name('admin.atendentes');
    Route::resource('classificacoes-ocorrencia', 'ClassificacaoOcorrenciaController');
    Route::resource('usuarios', 'UserController');
});

Auth::routes();
