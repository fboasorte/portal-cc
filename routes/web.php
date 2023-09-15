<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\PostagemController;
use App\Http\Controllers\TipoPostagemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TccController;
use Illuminate\Routing\RouteAction;
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
Route::get('/tipo-postagem', [TipoPostagemController::class, 'index']);
Route::get('/tipo-postagem/index', [TipoPostagemController::class, 'index']);

Route::get('/tipo-postagem/create', [TipoPostagemController::class, 'create'])->name('create_tipo_postagem');

Route::post('/tipo-postagem/create', [TipoPostagemController::class, 'store'])->name('store_tipo_postagem');

Route::get('/tipo-postagem/edit/{id}', [TipoPostagemController::class, 'edit'])->name('edit_tipo_postagem');

Route::post('/tipo-postagem/edit/{id}', [TipoPostagemController::class, 'update'])->name('update_tipo_postagem');


// Postagem
Route::get('/postagem', [PostagemController::class, 'index']);
Route::get('/postagem/index', [PostagemController::class, 'index']);

Route::get('/postagem/create', [PostagemController::class, 'create'])->name('create_postagem');

Route::post('/postagem/create', [PostagemController::class, 'store'])->name('store_postagem');

Route::get('/postagem/edit/{id}', [PostagemController::class, 'edit'])->name('edit_postagem');

Route::post('/postagem/edit/{id}', [PostagemController::class, 'update'])->name('update_postagem');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ALUNO

Route::prefix('/aluno')->group(function(){
    Route::get('/', [AlunoController::class, 'index']);

    Route::get('/create', [AlunoController::class, 'create'])->name('create_aluno');

    Route::post('/create', [AlunoController::class, 'store'])->name('store_aluno');

    Route::get('/edit/{id}', [AlunoController::class, 'edit'])->name('edit_aluno');

    Route::post('/edit/{id}', [AlunoController::class, 'update'])->name('update_aluno');

    Route::get('/delete/{id}', [AlunoController::class, 'deleteConfirm'])->name('delete_aluno_confirm');

    Route::post('/delete/{id}', [AlunoController::class, 'deleteAluno'])->name('delete_aluno');

    Route::get('/serach{nomeAluno?}', [AlunoController::class, 'search'])->name('search_aluno');
});


// PROFESSOR EXTERNO
Route::resource('professor-externo', professorExternoController::class)->parameter('professor-externo', 'id')
->except(['show']);

//BANCA
Route::resource('banca', BancaController::class)->parameter('banca', 'id')
->except(['show']);


// TCC
Route::prefix('/tcc')->group(function() {
    Route::get('/', [TccController::class, 'index']);

    Route::get('/create', [TccController::class, 'create'])->name('create_tcc');

    Route::post('/store', [TccController::class, 'store'])->name('store_tcc');

    Route::get('/edit/{id}', [TccController::class, 'edit'])->name('edit_tcc');

    Route::post('/edit/{id}', [TccController::class, 'update'])->name('update_tcc');

    Route::get('/delete/{id}', [TccController::class, 'deleteView'])->name('delete_view');

    Route::post('/delete/{id}', [TccController::class, 'deleteTcc'])->name('delete_tcc');

    Route::get('/serach{tituloBusca?}', [TccController::class, 'search'])->name('search_tcc');
});
