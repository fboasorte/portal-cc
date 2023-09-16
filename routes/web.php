<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\BancaController;
use App\Http\Controllers\PostagemController;
use App\Http\Controllers\ProfessorExternoController;
use App\Http\Controllers\ProfessorController;
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

Route::delete('/postagem/delete_imagem/{id}', [PostagemController::class, 'deleteImagem'])->name('postagem.delete_imagem');

Route::delete('/postagem/delete_arquivo/{id}', [PostagemController::class, 'deleteArquivo'])->name('postagem.delete_arquivo');

Route::get('/postagem/edit/{id}', [PostagemController::class, 'edit'])->name('edit_postagem');

Route::post('/postagem/edit/{id}', [PostagemController::class, 'update'])->name('update_postagem');

// Professor
Route::get('professor',[ProfessorController::class, 'index']);

Route::get('/professor/create', [ProfessorController::class, 'create'])->name('create_professor');
Route::post('/professor/create', [ProfessorController::class, 'store'])->name('store_professor');

Route::get('/professor/edit/{id}', [ProfessorController::class, 'edit'])->name('edit_professor');
Route::post('/professor/edit/{id}', [ProfessorController::class, 'update'])->name('update_professor');

Route::get('/professor/view/{id}', [ProfessorController::class, 'view'])->name('view_professor');

Route::get('professor/delete/{id}', [ProfessorController::class, 'delete'])->name('delete_professor');



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
