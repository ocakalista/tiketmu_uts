<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
// Import Admin Controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ConcertController;
use App\Http\Controllers\Admin\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Concert Management
    Route::resource('concerts', ConcertController::class);
    
    // Booking Management
    Route::resource('bookings', BookingController::class)->except(['create', 'store', 'edit']);
    
});

// Route untuk halaman utama dan statis
Route::get('/', function () {
    return view('welcome'); // Gunakan satu view saja
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/feature', function () {
    return view('feature');
})->name('feature');

Route::get('/testimonial', function () {
    return view('testimonial');
})->name('testimonial');

Route::get('/team', function () {
    return view('team');
})->name('team');

// Event Routes - Public routes (tidak perlu login)
Route::prefix('events')->name('events.')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('index');
    Route::get('/search', [EventController::class, 'search'])->name('search');
    Route::get('/featured', [EventController::class, 'featured'])->name('featured');
    Route::get('/detail/{id}', [EventController::class, 'detail'])->name('detail');
    Route::get('/{id}', [EventController::class, 'detail'])->name('show');
});

// Concert Routes - Alias untuk events (backward compatibility)
Route::get('/concert', [EventController::class, 'index'])->name('concert');
Route::get('/concert/detail/{id}', [EventController::class, 'detail'])->name('concert.detail');

// Detail routes - Multiple patterns untuk fleksibilitas
Route::get('/detail/{id}', [EventController::class, 'detail'])->name('detail');
Route::get('/event/detail/{id}', [EventController::class, 'detail'])->name('event.detail');

// API Routes untuk AJAX (optional)
Route::prefix('api')->name('api.')->group(function () {
    Route::get('/events', [EventController::class, 'getEvents'])->name('events');
    Route::get('/events/{id}', [EventController::class, 'getEvent'])->name('event');
});

// Auth Routes - untuk guest saja
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::get('/signup', [AuthController::class, 'showJoinForm'])->name('join');
    Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');
    Route::post('/signup', [AuthController::class, 'processSignup'])->name('signup.store');
});

// Route untuk authenticated users
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
    // Booking routes - perlu login
    Route::post('/event/{id}/book', [EventController::class, 'book'])->name('event.book');
    Route::post('/events/{id}/book', [EventController::class, 'book'])->name('events.book');
    Route::post('/book/{id}', [EventController::class, 'book'])->name('book');
    
    // Profile routes
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
    
    // Booking history
    Route::get('/my-bookings', [EventController::class, 'myBookings'])->name('bookings.index');
});

// Route untuk contact form - bisa diakses tanpa login
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Route untuk handle booking tanpa login (jika diperlukan)
Route::post('/guest-book/{id}', [EventController::class, 'guestBook'])->name('guest.book');

// Fallback route untuk handle 404 - HANYA SATU!
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});