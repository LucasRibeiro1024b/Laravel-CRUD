<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\LoginController;

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home.get.view');

    Route::get('view/login', [LoginController::class, 'logout'])->name('login.get.logout');
    Route::post('view/login', [LoginController::class, 'authenticate'])->name('login.post.view');

    Route::get('new/user', [LoginController::class, 'createView'])->name('login.get.new');
    Route::post('new/user', [LoginController::class, 'create'])->name('login.post.new');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('view/livros', [LivroController::class, "index"])->name('livro.get.view');

    Route::get('new/livro', [LivroController::class, 'createView'])->name('livro.get.new');
    Route::post('new/livro', [LivroController::class, 'create'])->name('livro.post.new');

    Route::get('edit/livro/{livro}', [LivroController::class, 'editView'])->name('livro.get.edit');
    Route::put('edit/livro/{livro}', [LivroController::class, 'edit'])->name('livro.put.edit');

    Route::get('delete/livro/{livro}', [LivroController::class, 'deleteView'])->name('livro.get.delete');
    Route::delete('delete/livro/{livro}', [LivroController::class, 'delete'])->name('livro.delete.delete');
});
