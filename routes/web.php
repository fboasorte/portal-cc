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


/*--------------------------INFORMAÇÕES PÚBLICAS-------------------------------*/

//Página Inicial 
Route::get('/', function () {
    return view('welcome');
});

// Displays de postagens e professores (Não editável)
Route::get('/noticias', [PostagemController::class, 'display']);
Route::get('/professores', [ProfileController::class, 'display']);

//Informações dos Professores (Não Editável)
//Route::resource('/professores/info', ProfileController::class)->parameter('user','id')->except(['show']);


/*--------------INFORMAÇÕES PRIVADAS (NECESSÁRIO REGISTRO E LOGIN)-------------*/

//Landing Page (Após login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//CRUDs
Route::middleware('auth')->group(function () {

    //Usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile/delete_foto/{id}', [ProfileController::class, 'deleteFoto'])->name('profile.delete_foto');

    // TipoPostagem
    Route::resource('tipo-postagem', TipoPostagemController::class)->parameter('tipo-postagem', 'id')->except(['show']);

    // Postagem
    Route::resource('postagem', PostagemController::class)->parameter('postagem', 'id')->except(['show']);
    Route::delete('/postagem/delete_imagem/{id}', [PostagemController::class, 'deleteImagem'])->name('postagem.delete_imagem');
    Route::delete('/postagem/delete_arquivo/{id}', [PostagemController::class, 'deleteArquivo'])->name('postagem.delete_arquivo');

    //Banca
    Route::resource('banca', BancaController::class)->parameter('banca', 'id')->except(['show']);

    // TCC
    Route::resource('tcc', TccController::class)->parameter('tcc', 'id')->except(['show']);

    // Projeto
    Route::resource('projeto', ProjetoController::class)->parameter('projeto', 'id')->except(['show']);
    Route::get('/projeto/busca-professor', [ProjetoController::class, 'buscaProfessor']);
    Route::get('/projeto/busca-aluno', [ProjetoController::class, 'buscaAluno']);

    // Professor
    Route::resource('professor', ProfessorController::class)->parameter('professor', 'id');

});

require __DIR__ . '/auth.php';


//Aluno
Route::resource('aluno', AlunoController::class)->parameter('aluno', 'id')->only(['store']);

//Professor Externo
Route::resource('professor-externo', ProfessorExternoController::class)->parameter('professor-externo', 'id')
    ->only(['index', 'store']); 

