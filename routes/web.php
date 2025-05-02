<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

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

    Route::get('/blog', function () {
        return view('blog', ['title' => "Blog"]);
    });

    Route::get('/contact', function () {
        return view('contact', ['title' => "Contact"]);
    });

    Route::get('/login', function () {
        return view('login', ['title' => "Login"]);
    })->name('login');

    Route::get('/signup', function () {
        return view('signup', ['title' => "Sign Up"]);
    })->name('signup');

});
