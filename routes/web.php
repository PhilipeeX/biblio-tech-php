<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/autores');
Route::get('/autores', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/autor/{id}', [AuthorController::class, 'show'])->name('author');
Route::get('/autores/cadastrar', [AuthorController::class, 'create'])->name('authors.create');
Route::post('/autor', [AuthorController::class, 'store'])->name('authors.store');
Route::get('/autor/{id}/editar', [AuthorController::class, 'edit'])->name('author.edit');
Route::patch('/autor/{id}', [AuthorController::class, 'update'])->name('author.update');
Route::delete('/autor/{id}', [AuthorController::class, 'destroy'])->name('author.destroy');
