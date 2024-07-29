<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class CommentController extends Controller
{
    public function store(): Application|Redirector|RedirectResponse
    {
        request()->validate([
            'post_id' => ['required', 'exists:posts,id'],
            'body' => 'required'
        ]);
        Comment::create([
            'post_id' => request('post_id'),
            'user_id' => auth()->id(),
            'body' => request('body')
        ]);
        return redirect('/post/' . request('post_id'));
    }
}
