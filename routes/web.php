<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CouponController;

// Public Restaurant Routes
Route::get('/', [RestaurantController::class, 'index'])->name('home'); // Home page with restaurant listings
Route::get('/restaurant/{id}', [RestaurantController::class, 'show'])->name('restaurant.show');

// Static View Routes
Route::view('/contact', 'user.contact')->name('contact');
Route::view('/restaurant', 'user.restaurant')->name('user.restaurant');

// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/admin/restaurant-home', [RestaurantController::class, 'restaurantHome'])->name('restaurant.home');

    Route::get('/dashboard', function () {
        return view('admin.dashboard.dashboard');
    })->name('dashboard');

    // Restaurant Routes
    Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');  // Update this line
    Route::get('/restaurants/create', [RestaurantController::class, 'create'])->name('restaurants.create');
    Route::post('/restaurants', [RestaurantController::class, 'store'])->name('restaurants.store');
    Route::get('/restaurants/{id}/edit', [RestaurantController::class, 'edit'])->name('restaurants.edit');
    Route::put('/restaurants/{id}', [RestaurantController::class, 'update'])->name('restaurants.update');
    Route::delete('/restaurants/{id}', [RestaurantController::class, 'destroy'])->name('restaurants.destroy');

    // Customer Routes
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');  // Make sure this is present
    Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');


    // Transaction Routes
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');

    // Coupon Routes
    Route::get('/coupons', [CouponController::class, 'index'])->name('coupons.index');
    Route::get('/coupons/{id}', [CouponController::class, 'show'])->name('coupons.show');
});

// Authentication Routes
Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegistrationController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
