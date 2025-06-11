<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::redirect('/', '/autores');
Route::get('/autores', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/autores/cadastrar', [AuthorController::class, 'create'])->name('authors.create');
Route::post('/autor', [AuthorController::class, 'store'])->name('authors.store');
