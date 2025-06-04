<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login', ['title' => 'Login']);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => __('messages.sections.login_page.errors.email_required'),
            'email.email' => __('messages.sections.login_page.errors.email_invalid'),
            'password.required' => __('messages.sections.login_page.errors.password_required'),
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();

            // Check user role and redirect accordingly
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended('/dashboard');
            }

            return redirect()->intended('/rent');
        }

        return back()->withErrors([
            'email' => __('messages.sections.login_page.errors.invalid_credentials'),
        ])->onlyInput('email');
    }
}