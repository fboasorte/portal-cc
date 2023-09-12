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
Route::resource('tipo-postagem', TipoPostagemController::class)->parameter('tipo-postagem', 'id')->except(['show']);

// Postagem
Route::resource('postagem', PostagemController::class)->parameter('postagem', 'id')->except(['show']);

Route::delete('/postagem/delete_imagem/{id}', [PostagemController::class, 'deleteImagem'])->name('delete_imagem_postagem');

Route::delete('/postagem/delete_arquivo/{id}', [PostagemController::class, 'deleteArquivo'])->name('delete_arquivo_postagem');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// ALUNO

Route::prefix('/aluno')->group(function () {
    Route::get('/', [AlunoController::class, 'index']);

    Route::get('/create', [AlunoController::class, 'create'])->name('create_aluno');

    Route::post('/create', [AlunoController::class, 'store'])->name('store_aluno');

    Route::get('/edit/{id}', [AlunoController::class, 'edit'])->name('edit_aluno');

    Route::post('/edit/{id}', [AlunoController::class, 'update'])->name('update_aluno');

    Route::get('/delete/{id}', [AlunoController::class, 'deleteConfirm'])->name('delete_aluno_confirm');

    Route::post('/delete/{id}', [AlunoController::class, 'deleteAluno'])->name('delete_aluno');

    Route::get('/serach{nomeAluno?}', [AlunoController::class, 'search'])->name('search_aluno');
});

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
