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
    return view('auth.login');
});

Route::get('/redefinir', function(){
  return view('auth.passwords.email');
})->name('redefinir_senha');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sistemas', 'SistemaController@sistemas')->name('sistemas');

// rotas desenvolvedores
Route::get('/desenvolvedores', 'DesenvolvedorController@desenvolvedores')->name('desenvolvedores');
Route::get('/desenvolvedor_cadastro', 'DesenvolvedorController@cadastro')->name('desenvolvedor_cadastro');
Route::post('/desenvolvedor_cadastrar', 'DesenvolvedorController@cadastrar')->name('desenvolvedor_cadastrar');
Route::get('/desenvolvedor_excluir/{id}', 'DesenvolvedorController@excluir')->name('desenvolvedor_excluir');
Route::get('/desenvolvedor_edicao/{id}', 'DesenvolvedorController@edicao')->name('desenvolvedor_edicao');
Route::post('/desenvolvedor_editar/{id}', 'DesenvolvedorController@editar')->name('desenvolvedor_editar');

//rotas banco de dados
Route::get('/bancos_dados', 'BancoDadosController@bancos_dados')->name('bancos_dados');
Route::get('/banco_dados_cadastro', 'BancoDadosController@cadastro')->name('banco_dados_cadastro');
Route::post('/banco_dados_cadastrar', 'BancoDadosController@cadastrar')->name('banco_dados_cadastrar');
Route::get('/banco_dados_excluir/{id}', 'BancoDadosController@excluir')->name('banco_dados_excluir');
Route::get('/banco_dados_edicao/{banco_dados}', 'BancoDadosController@edicao')->name('banco_dados_edicao');
Route::post('/banco_dados_edicao/{id}', 'BancoDadosController@editar')->name('banco_dados_editar');

//rotas ambientes
Route::get('/ambientes', 'AmbienteController@ambientes')->name('ambientes');
Route::get('/ambiente_cadastro', 'AmbienteController@cadastro')->name('ambiente_cadastro');
Route::post('/ambiente_cadastrar', 'AmbienteController@cadastrar')->name('ambiente_cadastrar');
Route::get('/ambiente_excluir/{id}', 'AmbienteController@excluir')->name('ambiente_excluir');
Route::get('/ambiente_edicao/{ambiente}', 'AmbienteController@edicao')->name('ambiente_edicao');
Route::post('/ambiente_editar/{ambiente}', 'AmbienteController@editar')->name('ambiente_editar');
Route::get('/ambiente_detalhes/{ambiente}', 'AmbienteController@detalhes')->name('ambiente_detalhes');
