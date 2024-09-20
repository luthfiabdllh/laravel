<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\category;
use App\Http\Controllers\CRUD;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return view('about', [
        'name' => 'luthfi',
        'email' => 'ahmadluthfi536@gmail.com'
    ]);
})->name('about');

Route::get('/dashboard', function () {
    return view('layout.dashboard', [
        'name' => 'luthfi',
        'email' => 'ahmadluthfi536@gmail.com'
    ]);
})->name('dashboard');

Route::get('/website', function () {
    return view('layout.website', [
        'name' => 'luthfi',
        'email' => 'ahmadluthfi536@gmail.com'
    ]);
})->name('dashboard');

Route::get('/posts', [PostController::class, 'index']);
Route::get('/routes', [CRUD::class, 'index']);

Route::get('/postsCateg', [category::class, 'index']);


Route::get('/buku', [BookController::class, 'index']);


Route::get('/buku/create', [BookController::class, 'create'])->name('buku.create');
Route::post('/buku', [BookController::class, 'store'])->name('buku.store');

Route::delete('/buku/{id}', [BookController::class, 'destroy'])->name('buku.destroy');

Route::get('/buku/edit{id}', [BookController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BookController::class, 'update'])->name('buku.update');

