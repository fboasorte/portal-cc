<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// TipoPostagem
Route::get('/tipo-postagem/index', 'App\Http\Controllers\TipoPostagemController@index');

Route::get('/tipo-postagem/create', 'App\Http\Controllers\TipoPostagemController@create')->name('create_tipo_postagem');

Route::post('/tipo-postagem/create', 'App\Http\Controllers\TipoPostagemController@store')->name('store_tipo_postagem');

Route::get('/tipo-postagem/edit/{id}', 'App\Http\Controllers\TipoPostagemController@edit')->name('edit_tipo_postagem');

Route::post('/tipo-postagem/edit/{id}', 'App\Http\Controllers\TipoPostagemController@update')->name('update_tipo_postagem');


// Postagem
// Route::get('/postagem/create', 'App\Http\Controllers\PostagemController@create');

// Route::post('/postagem/create', 'App\Http\Controllers\PostagemController@store')->name('registrar_postagem');
