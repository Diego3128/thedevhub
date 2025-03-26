<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('main');
});


Route::get('/create-account', [RegisterController::class, 'index'])->name('register.index');
Route::post('/create-account', [RegisterController::class, 'store'])->name('register.store');

// Route::get('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/feed', [PostController::class, 'index'])->name('post.index');
