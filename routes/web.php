<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Route untuk ganti bahasa
Route::get('/locale/{lang}', function ($lang) {
    if (! in_array($lang, ['en', 'id'])) {
        abort(400);
    }

    Session::put('locale', $lang);
    App::setLocale($lang);

    return Redirect::back();
});

// Semua route lain dibungkus pakai middleware SetLocale
Route::middleware([\App\Http\Middleware\SetLocale::class])->group(function () {

    Route::get('/', function () {
        return view('home', ['title' => "Home"]);
    });

    Route::get('/about', function () {
        return view('about', ['title' => "About"]);
    });

    Route::get('/rent', function () {
        return view('rent', ['title' => "Rent"]);
    });

    Route::get('/rent-detail', function () {
        return view('rent-detail', ['title' => "Rental-detail"]);
    });

    Route::get('/blog', function () {
        return view('blog', ['title' => "Blog"]);
    });

    Route::get('/contact', function () {
        return view('contact', ['title' => "Contact"]);
    });

    Route::get('/login', function () {
        return view('login', ['title' => "Login"]);
    })->name('login');

    // Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('signup');
    // Route::post('/signup', [RegisterController::class, 'register'])->name('signup');
    // Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    // Route::get('/auth/google', [RegisterController::class, 'redirectToGoogle'])->name('auth.google');
    // Route::get('/auth/google/callback', [RegisterController::class, 'handleGoogleCallback']);
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware('auth')->name('dashboard');
    Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('signup');
    Route::post('/signup', [RegisterController::class, 'register'])->name('signup');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/auth/google', [RegisterController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [RegisterController::class, 'handleGoogleCallback']);
    Route::get('/profile', function () {
        return view('profile');
    })->middleware('auth')->name('profile');
    // use App\Http\Controllers\Auth\ForgotPasswordController;
    // use App\Http\Controllers\Auth\ResetPasswordController;

    // Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    // Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    // Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    // Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});
