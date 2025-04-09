<?php

use App\Http\Controllers\CommentController;
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
    Route::get('/{username}',  [PostController::class, 'index'])->name('post.index')->withoutMiddleware(['auth']);
    // create a post
    Route::get('/posts/create',  [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store',  [PostController::class, 'store'])->name('posts.store');
    //upload post image
    Route::post('/image/store', [ImageController::class, 'store'])->name('image.store');
    // show a post
    Route::get('/{user:username}/posts/show/{post}', [PostController::class, 'show'])->name('posts.show')->withoutMiddleware(['auth']);
    // store a comment
    Route::post('/{user:username}/posts/{post}', [CommentController::class, 'store'])->name('comment.store');
    // delete a post
    Route::delete('/posts/{post}',  [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/logout',  [LogoutController::class, 'logout'])->name('logout');
});
