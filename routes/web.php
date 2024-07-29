<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Index
Route::view('/', 'home')->middleware('auth');

// Post
Route::get('/posts', [PostController::class, 'index'])->middleware('auth');
Route::get('/post/{id}', [PostController::class, 'show', 'id'])->middleware('auth');
Route::post('/post', [PostController::class, 'store'])->middleware('auth');;

//Auth
Route::get('/register', [RegistrationController::class, 'create'])->middleware('guest');
Route::post('/register', [RegistrationController::class, 'store'])->middleware('guest');

// Session
Route::get('/login', [SessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::post('/comment', [CommentController::class, 'store'])->middleware('auth');

// Todo

Route::get('/profile/{id}', function($id){
    $user = User::with('posts')->find($id);
    return view('profile.show', ['user' => $user]);
});



