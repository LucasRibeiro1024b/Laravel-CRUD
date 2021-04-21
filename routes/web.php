<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('livros', [LivroController::class, "index"])->name('livros')->middleware('auth');

Route::get('livros/add', [LivroController::class, 'createView'])->name('livros.add');
Route::post('livros/add', [LivroController::class, 'create'])->name('livros.create');

Route::get('livros/edit/{livro}', [LivroController::class, 'editView'])->name('livros.edit');
Route::put('livros/edit/{livro}', [LivroController::class, 'edit'])->name('livros.edit');

Route::get('livros/delete/{livro}', [LivroController::class, 'deleteView'])->name('livros.delete');
Route::delete('livros/delete/{livro}', [LivroController::class, 'delete'])->name('livros.delete');

Route::post('user', [LoginController::class, 'authenticate'])->name('user.login');
Route::get('user', [LoginController::class, 'logout'])->name('user.logout');

Route::get('adduser', [LoginController::class, 'createView'])->name('user.add');
//Route::post('adduser', [LoginController::class, 'create'])->name('usuario.criar');
