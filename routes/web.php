<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AtaController;
use App\Http\Controllers\BancaController;
use App\Http\Controllers\ColegiadoController;
use App\Http\Controllers\PostagemController;
use App\Http\Controllers\ProfessorExternoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\TipoPostagemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\ServidorController;
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

Route::get('/postagem/display', [PostagemController::class, 'display']);

// TipoPostagem
Route::resource('tipo-postagem', TipoPostagemController::class)->parameter('tipo-postagem', 'id')->except(['show']);

// Postagem
Route::resource('postagem', PostagemController::class)->parameter('postagem', 'id')->except(['show']);

Route::get('/postagem/show/{id}', [PostagemController::class, 'show'])->name('postagem.show');

Route::delete('/postagem/delete_imagem/{id}', [PostagemController::class, 'deleteImagem'])->name('postagem.delete_imagem');

Route::delete('/postagem/delete_arquivo/{id}', [PostagemController::class, 'deleteArquivo'])->name('postagem.delete_arquivo');

// Professor
Route::resource('professor', ProfessorController::class)->parameter('professor', 'id');

// SERVIDOR
Route::resource('servidor', ServidorController::class)->parameter('servidor', 'id')->except(['show', 'edit', 'update', 'destroy']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Aluno
Route::resource('aluno', AlunoController::class)->parameter('aluno', 'id')->only(['store']);

// Professor Externo
Route::resource('professor-externo', ProfessorExternoController::class)->parameter('professor-externo', 'id')
    ->only(['index', 'store']);

//BANCA
Route::resource('banca', BancaController::class)->parameter('banca', 'id')
    ->except(['show']);

// TCC
Route::resource('tcc', TccController::class)->parameter('tcc', 'id')
    ->except(['show']);

// Projeto
Route::resource('projeto', ProjetoController::class)->parameter('projeto', 'id')->except(['show']);

Route::get('/projeto/busca-professor', [ProjetoController::class, 'buscaProfessor']);

Route::get('/projeto/busca-aluno', [ProjetoController::class, 'buscaAluno']);

// COLEGIADO
Route::resource('colegiado', ColegiadoController::class)->parameter('colegiado', 'id')
    ->except(['show']);

// ATA
Route::resource('ata', AtaController::class)->parameter('ata', 'id')->except(['index']);
