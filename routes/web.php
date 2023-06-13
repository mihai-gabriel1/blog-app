<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use \App\Http\Controllers\RegisterController;


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);

//Route::get('authors/{author:username}', function (User $author) {
//    return view('posts', [
//        'posts' => $author->posts
//    ]);
//});

Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);
