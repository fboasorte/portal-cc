<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\BancaController;
use App\Http\Controllers\PostagemController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\ProfessorExternoController;
use App\Http\Controllers\TipoPostagemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TccController;
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

Route::delete('/postagem/delete_imagem/{id}', [PostagemController::class, 'deleteImagem'])->name('postagem.delete_imagem');

Route::delete('/postagem/delete_arquivo/{id}', [PostagemController::class, 'deleteArquivo'])->name('postagem.delete_arquivo');

// Professor
Route::resource('professor', ProfessorController::class)->parameter('professor', 'id');


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
Route::resource('aluno', AlunoController::class)->parameter('aluno', 'id')
->except(['show']);

// PROFESSOR EXTERNO
Route::resource('professor-externo', ProfessorExternoController::class)->parameter('professor-externo', 'id')
->except(['show']);

//BANCA
Route::resource('banca', BancaController::class)->parameter('banca', 'id')
->except(['show']);

// TCC
Route::resource('tcc', TccController::class)->parameter('tcc', 'id')
->except(['show']);
