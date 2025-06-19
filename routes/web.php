<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\ProfileController;

Route::get('/test', function () {
    return view('test');
});
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

    Route::name('cars.')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/rent', [RentController::class, 'index'])->name('rent');
        Route::get('/rent/{id}', [RentController::class, 'show'])->name('show');
        Route::post('/rent', [RentController::class, 'store'])->name('rent.store');
    });

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'changePassword'])->name('profile.password');


    Route::get('/about', function () {
        return view('about', ['title' => __('messages.navbar.about')]);
    });

    Route::get('/blog', function () {
        return view('blog', ['title' => __('messages.navbar.blog')]);
    });

    Route::get('/contact', function () {
        return view('contact', ['title' => __('messages.navbar.contact')]);
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
});
