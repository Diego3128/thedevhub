<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get('/create-account',  [RegisterController::class, 'index'])->name('register.index');
Route::post('/create-account',  [RegisterController::class, 'store'])->name('register.store');

Route::get('/access',  [LoginController::class, 'index'])->name('login.index');
Route::post('/access',  [LoginController::class, 'store'])->name('login.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/{username}',  [PostController::class, 'index'])->name('post.index');
    Route::get('/posts/create',  [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store',  [PostController::class, 'store'])->name('posts.store');
    //upload image
    Route::post('/image/store', [ImageController::class, 'store'])->name('image.store');

    Route::post('/logout',  [LogoutController::class, 'logout'])->name('logout');
});
