<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::get('/posts', function() {
    $posts = Post::with('user', 'comments')->get();
    return view('post.index', ['posts' => $posts]);
});

Route::get('/post/{id}', function($id) {
    $post = Post::with('user', 'comments')->find($id);
    return view('post.show', ['post' => $post]);
});

Route::view('/register', 'auth.register');

Route::view('/login', 'auth.login');


