<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\HomeController;

// Public Restaurant Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home/{id}', [HomeController::class, 'index'])->name('Home.index');

Route::get('/restaurants', [RestaurantController::class, 'userIndex'])->name('restaurants.user.index');
Route::get('/restaurant/{id}', [RestaurantController::class, 'show'])->name('restaurant.show');
Route::get('/restaurant-home', [RestaurantController::class, 'restaurantHome'])->name('restaurant.home');

// Static View Routes
Route::view('/contact', 'user.contact')->name('contact');

// Authentication Routes
Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegistrationController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {


    Route::get('/dashboard', function () {
        return view('admin.dashboard.dashboard');
    })->name('dashboard');

    // Restaurant Routes
    Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');  // Update this line
    Route::get('/restaurants/create', [RestaurantController::class, 'create'])->name('restaurants.create');
    Route::post('/restaurants/store', [RestaurantController::class, 'store'])->name('restaurants.store');
    Route::get('restaurants/{id}/edit', [RestaurantController::class, 'edit'])->name('restaurants.edit');
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
    Route::get('/coupons/create', [CouponController::class, 'create'])->name('coupons.create');  // Corrected route name
    Route::get('/coupons/{id}', [CouponController::class, 'show'])->name('coupons.show');
    Route::post('/coupons/store', [CouponController::class, 'store'])->name('coupons.store');

});

Route::prefix('seller')->middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('seller.dashboard.dashboard');
    })->name('seller.dashboard');

    // Restaurant-specific Routes for Seller
    Route::get('/restaurant/{id}', [RestaurantController::class, 'showSellerRestaurant'])->name('seller.restaurant.show');
    Route::get('/restaurant/{id}/edit', [RestaurantController::class, 'editSellerRestaurant'])->name('seller.restaurant.edit');
    Route::put('/restaurant/{id}', [RestaurantController::class, 'updateSellerRestaurant'])->name('seller.restaurant.update');

    // Coupon Routes for Seller
    Route::get('/restaurant/{id}/coupons', [CouponController::class, 'showRestaurantCoupons'])->name('seller.restaurant.coupons');
    Route::post('/restaurant/{id}/coupons/store', [CouponController::class, 'storeRestaurantCoupon'])->name('seller.restaurant.coupons.store');

    // Transaction Routes for Seller
    Route::get('/restaurant/{id}/transactions', [TransactionController::class, 'showRestaurantTransactions'])->name('seller.restaurant.transactions');
});
