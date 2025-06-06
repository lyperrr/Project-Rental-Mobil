<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class SignupController extends Controller
{
    public function showRegistrationForm()
    {
        return view('signup', ['title' => 'Signup']);
    }

    public function Signup(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        // Optionally log the user in after registration
        // auth()->login($user);

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:100', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['required', 'accepted'],
        ], [
            'username.required' => __('messages.sections.signup_page.errors.username_required'),
            'username.unique' => __('messages.sections.signup_page.errors.username_taken'),
            'email.required' => __('messages.sections.signup_page.errors.email_required'),
            'email.email' => __('messages.sections.signup_page.errors.email_invalid'),
            'email.unique' => __('messages.sections.signup_page.errors.email_taken'),
            'password.required' => __('messages.sections.signup_page.errors.password_required'),
            'password.min' => __('messages.sections.signup_page.errors.password_min'),
            'password.confirmed' => __('messages.sections.signup_page.errors.password_confirmation'),
            'terms.required' => __('messages.sections.signup_page.errors.terms_required'),
            'terms.accepted' => __('messages.sections.signup_page.errors.terms_accepted'),
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user',
            'is_verified' => false,
        ]);
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Check if user exists, if not create a new one
            $user = User::firstOrCreate(
                ['email' => $googleUser->email],
                [
                    'username' => $this->generateUniqueUsername($googleUser->name),
                    'password' => Hash::make(uniqid()), // Random password for Google users
                    'role' => 'user',
                    'is_verified' => true, // Google users are typically verified
                ]
            );

            Auth::login($user, true);
            return redirect()->intended('/dashboard');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', __('messages.sections.login_page.errors.google_login_failed'));
        }
    }

    protected function generateUniqueUsername($name)
    {
        $baseUsername = str_replace(' ', '_', strtolower($name));
        $username = $baseUsername;
        $counter = 1;

        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . '_' . $counter++;
        }

        return $username;
    }
}