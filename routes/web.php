<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;



Route::withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class])
    ->post('/midtrans/webhook', [RentController::class, 'handleWebhook']);

//Route ganti bahasa
Route::get('/locale/{lang}', function ($lang) {
    if (!in_array($lang, ['en', 'id'])) abort(400);
    Session::put('locale', $lang);
    App::setLocale($lang);
    return Redirect::back();
});

//Route test
Route::get('/test', fn() => view('test'));

//Semua route dengan middleware SetLocale
Route::middleware([\App\Http\Middleware\SetLocale::class])->group(function () {

    //Auth routes
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

    //Halaman statis
    Route::view('/about', 'about', ['title' => __('messages.navbar.about')])->name('about');
    Route::view('/contact', 'contact', ['title' => __('messages.navbar.contact')])->name('contact');

    //Blog routes
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/show/{id}', [BlogController::class, 'showDetail'])->name('show');
    Route::get('/blog/image/{id}', [BlogController::class, 'showImage'])->name('blog.image');

    //Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/mobil', [AdminController::class, 'mobil'])->name('mobil');
        Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');
        Route::get('/pelanggan', [AdminController::class, 'pelanggan'])->name('pelanggan');
        Route::get('/penyewaan', [AdminController::class, 'penyewaan'])->name('penyewaan');
        Route::get('/blog', [AdminController::class, 'blog'])->name('admin.blog');
    });

    //Public car & rental routes
    Route::name('cars.')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/rent', [RentController::class, 'index'])->name('rent');
        Route::get('/rent/{id}', [RentController::class, 'show'])->name('show');
        Route::post('/rent', [RentController::class, 'store'])->name('rent.store');
    });

    //Optional: Snap Token via AJAX
    Route::post('/payment/snap-token', [RentController::class, 'generateSnapToken'])->name('payment.snap-token');

    //Profile routes (auth only)
    Route::middleware(['auth'])->group(function () {
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'index')->name('profile');
            Route::put('/profile', 'update')->name('profile.update');
        });
    });
});
