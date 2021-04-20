<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('livros', [LivroController::class, 'index'])->name('livros');

Route::get('livros/add', [LivroController::class, 'createView'])->name('livros.add');
Route::post('livros/add', [LivroController::class, 'create'])->name('livros.create');

Route::get('livros/edit/{livro}', [LivroController::class, 'editView'])->name('livros.edit');
Route::put('livros/edit/{livro}', [LivroController::class, 'edit'])->name('livros.edit');

Route::get('livros/delete/{livro}', [LivroController::class, 'deleteView'])->name('livros.delete');
Route::delete('livros/delete/{livro}', [LivroController::class, 'delete'])->name('livros.delete');
