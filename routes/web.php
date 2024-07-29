<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::get('/posts', function() {
    $posts = Post::with('user', 'comments')->get();
    return view('posts', ['posts' => $posts]);
});


