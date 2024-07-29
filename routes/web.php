<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

// Index
Route::view('/', 'home')->middleware('auth');

// Post
Route::get('/posts', [PostController::class, 'index'])->middleware('auth');
Route::get('/post/{id}', [PostController::class, 'show', 'id'])->middleware('auth');;

//Auth
Route::get('/register', [RegistrationController::class, 'create'])->middleware('guest');
Route::post('/register', [RegistrationController::class, 'store'])->middleware('guest');

// Session
Route::get('/login', [SessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');



