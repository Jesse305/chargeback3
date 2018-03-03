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
