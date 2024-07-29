<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class PostController extends Controller
{
    public function index(): View|Factory|Application
    {
        $posts = Post::with('user', 'comments')->latest()->get();
        return view('post.index', ['posts' => $posts]);
    }

    public function store(): Application|Redirector|RedirectResponse
    {
        // Validate
        request()->validate([
            'body' => 'required',
        ]);
        // Store
        Post::create([
            'body' => request('body'),
            'user_id' => auth()->id(),
        ]);
        // Redirect
        return redirect('/posts');
    }

    public function show(string $id): View|Factory|Application
    {
        $post = Post::with('user', 'comments')->find($id);
        return view('post.show', ['post' => $post]);
    }
}
