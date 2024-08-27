<?php

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