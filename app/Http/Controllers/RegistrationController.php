<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function create(): View|Factory|Application
    {
        return view('auth.register');
    }

    public function store(): Application|Redirector|RedirectResponse
    {
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
    }


}
