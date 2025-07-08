<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\RentalController;

// Test route
Route::get('/test', fn() => view('test'));

// Route ganti bahasa
Route::get('/locale/{lang}', function ($lang) {
    if (!in_array($lang, ['en', 'id'])) abort(400);

    Session::put('locale', $lang);
    App::setLocale($lang);

    return Redirect::back();
});

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
    
    // Blog routes
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/show/{id}', [BlogController::class, 'showDetail'])->name('show');
    Route::get('/blog/image/{id}', [BlogController::class, 'showImage'])->name('blog.image');

    Route::view('/contact', 'contact', ['title' => __('messages.navbar.contact')])->name('contact');

    // Route admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/mobil', [AdminController::class, 'mobil'])->name('mobil');
        Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');
        Route::get('/pelanggan', [AdminController::class, 'pelanggan'])->name('pelanggan');
        Route::get('/blog', [AdminController::class, 'blog'])->name('admin.blog');

        // Blog CRUD routes
        Route::prefix('blogs')->name('blogs.')->group(function () {
            Route::get('/', [AdminBlogController::class, 'index'])->name('index');
            Route::get('/create', [AdminBlogController::class, 'create'])->name('create');
            Route::post('/', [AdminBlogController::class, 'store'])->name('store');
            Route::get('/{id}', [AdminBlogController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [AdminBlogController::class, 'edit'])->name('edit');
            Route::put('/{id}', [AdminBlogController::class, 'update'])->name('update');
            Route::delete('/{id}', [AdminBlogController::class, 'destroy'])->name('destroy');
        });

        // Rental CRUD routes - DIPERBAIKI
        Route::prefix('rentals')->name('rentals.')->group(function () {
            Route::get('/', [RentalController::class, 'index'])->name('index');
            Route::get('/create', [RentalController::class, 'create'])->name('create');
            Route::post('/', [RentalController::class, 'store'])->name('store');
            Route::get('/{rental}', [RentalController::class, 'show'])->name('show');
            Route::get('/{rental}/edit', [RentalController::class, 'edit'])->name('edit');
            Route::put('/{rental}', [RentalController::class, 'update'])->name('update');
            Route::delete('/{rental}', [RentalController::class, 'destroy'])->name('destroy');
            // PERBAIKAN: Tambahkan nama route yang konsisten
            Route::patch('/{rental}/status', [RentalController::class, 'updateStatus'])->name('status');
        });

        // Rental statistics route
        Route::get('/rentals-statistics', [RentalController::class, 'statistics'])->name('rentals.statistics');
        
        // Route alias untuk penyewaan (redirect ke rentals)
        Route::get('/penyewaan', function() {
            return redirect()->route('admin.rentals.index');
        })->name('penyewaan');
    });

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
    });
});