<?php

use App\Http\Controllers\PostagemController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\TipoPostagemController;
use App\Http\Controllers\ProfileController;
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

require __DIR__.'/auth.php';
