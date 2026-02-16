<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        return view('login', ['user' => Auth::user(),]);
    }
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate(
            [
                'email'    => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required'    => 'Поле E-mail обязательно.',
                'email.email'       => 'Поле E-mail должно быть корректным адресом.',
                'password.required' => 'Поле Пароль обязательно.',
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('trips');
        }

        return back()
            ->withErrors([
                'error' => 'The provided credentials do not match our records.',
            ])
            ->onlyInput('email', 'password');
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

