<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class PostController extends Controller
{
    public function index(): View|Factory|Application
    {
        $posts = Post::with('user', 'comments')->get();
        return view('post.index', ['posts' => $posts]);
    }

    public function show(string $id): View|Factory|Application
    {
        $post = Post::with('user', 'comments')->find($id);
        return view('post.show', ['post' => $post]);
    }
}
