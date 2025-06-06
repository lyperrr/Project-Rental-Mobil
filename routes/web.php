<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;

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
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware('auth')->name('dashboard');
    Route::get('/signup', [SignupController::class, 'showRegistrationForm'])->name('signup');
    Route::post('/signup', [SignupController::class, 'Signup'])->name('signup');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/auth/google', [SignupController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [SignupController::class, 'handleGoogleCallback']);
    Route::get('/profile', function () {
        return view('profile');
    })->middleware('auth')->name('profile');
});
