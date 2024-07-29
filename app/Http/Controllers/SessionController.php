<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(): View|Factory|Application
    {
        return view('auth.login');
    }
    /**
     * @throws ValidationException
     */
    public function store(): Application|Redirector|RedirectResponse
    {
        // Validate
        $attributes = request()->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        // Attempt to log-in
        if(! Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match our records.',
            ]);
        };
        // regenerate the session token
        request()->session()->regenerate();
        // redirect
        return redirect('/');
    }

    public function destroy(): Redirector|RedirectResponse
    {
        Auth::logout();
        return redirect('/login');
    }

}
