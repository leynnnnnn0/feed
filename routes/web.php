<?php
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

// Index
Route::view('/', 'home');

// Index
Route::get('/posts', function() {
    $posts = Post::with('user', 'comments')->get();
    return view('post.index', ['posts' => $posts]);
});

// Show
Route::get('/post/{id}', function($id) {
    $post = Post::with('user', 'comments')->find($id);
    return view('post.show', ['post' => $post]);
});

// Index
Route::view('/register', 'auth.register');
// Store
Route::post('/register', function(){
//     Validate
    $attributes = request()->validate([
        'username' => ['required', 'min:3'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required', 'min:8', 'confirmed'],
    ]);
    // Store
    $user = User::create($attributes);
    // Authorize
    Auth::login($user);
    // Redirect
    return redirect('/');
});

Route::post('/login', function(){
    // Validate
    $attributes = request()->validate([
        'email' => ['required'],
        'password' => ['required'],
    ]);
    // Attempt to login
    if(! Auth::attempt($attributes)){
        throw ValidationException::withMessages([
            'email' => 'Sorry, those credentials do not match our records.',
        ]);
    };
    // regenerate the session token
    request()->session()->regenerate();
    // redirect
    return redirect('/');
});

Route::post('/logout', function(){
    Auth::logout();
    return redirect('/login');
});

// Index
Route::view('/login', 'auth.login');


