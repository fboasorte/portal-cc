<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\BancaController;
use App\Http\Controllers\PostagemController;
use App\Http\Controllers\ProfessorExternoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\TipoPostagemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\TccController;
use App\Http\Controllers\MatrizController;
use App\Http\Controllers\CursoController;
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

// Projeto
Route::resource('projeto', ProjetoController::class)->parameter('projeto', 'id')->except(['show']);

Route::get('/projeto/busca-professor', [ProjetoController::class, 'buscaProfessor']);

Route::get('/projeto/busca-aluno', [ProjetoController::class, 'buscaAluno']);

// Matriz curricular
Route::resource('matriz', MatrizController::class)->parameter('matriz', 'id');

// Curso
Route::resource('curso', CursoController::class)->parameter('curso', 'id')->except(['show']);

Route::delete('/curso/delete_calendario/{id}', [CursoController::class, 'deleteCalendario'])->name('curso.delete_calendario');

Route::delete('/curso/delete_horario/{id}', [CursoController::class, 'deleteHorario'])->name('curso.delete_horario');

Route::get('download/calendario/{id}', [CursoController::class,'downloadCalendario'])->name('curso.download_calendario');

Route::get('download/horario/{id}', [CursoController::class,'downloadHorario'])->name('curso.download_horario');
