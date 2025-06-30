<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ReviewController;


// Test route
Route::get('/test', fn() => view('test'));

// Route ganti bahasa
Route::get('/locale/{lang}', function ($lang) {
    if (!in_array($lang, ['en', 'id'])) abort(400);

    Session::put('locale', $lang);
    App::setLocale($lang);

    return Redirect::back();
});

//route admin
// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// });




// Group middleware SetLocale
Route::middleware([\App\Http\Middleware\SetLocale::class])->group(function () {

    // Auth routes
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login')->name('login');
        Route::post('/logout', 'logout')->name('logout');
    });

    Route::controller(SignupController::class)->group(function () {
        Route::get('/signup', 'showRegistrationForm')->name('signup');
        Route::post('/signup', 'signup')->name('signup');
        Route::get('/auth/google', 'redirectToGoogle')->name('auth.google');
        Route::get('/auth/google/callback', 'handleGoogleCallback');
    });


    // Halaman statis
    Route::view('/about', 'about', ['title' => __('messages.navbar.about')])->name('about');
    Route::view('/blog', 'blog', ['title' => __('messages.navbar.blog')])->name('blog');
    Route::view('/contact', 'contact', ['title' => __('messages.navbar.contact')])->name('contact');

    // Route admin
        Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/mobil', [AdminController::class, 'mobil'])->name('mobil');
        Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');
        Route::get('/pelanggan', [AdminController::class, 'pelanggan'])->name('pelanggan');
        Route::get('/penyewaan', [AdminController::class, 'penyewaan'])->name('penyewaan');
        Route::get('/blog', [AdminController::class, 'blog'])->name('admin.blog');

    });


    // Route::name('admin.')->group(function () {
    //     Route::get('/admin/dashboard')->name('admin.dashboard');
    //     Route::get('/admin/mobil')->name('admin.cars');
    // });
    // Route::get('/dashboard', fn() => view('admin.dashboard'))->middleware('auth')->name('dashboard');


    // Cars routes
    Route::name('cars.')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/rent', [RentController::class, 'index'])->name('rent');
        Route::get('/rent/{id}', [RentController::class, 'show'])->name('show');
        Route::post('/rent', [RentController::class, 'store'])->name('rent.store');
    });

    // Profile (auth only)
    Route::middleware(['auth'])->group(function () {
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'index')->name('profile');
            Route::put('/profile', 'update')->name('profile.update');
        });

        Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    });
});
