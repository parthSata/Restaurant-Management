<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\HomeController;

Route::get('/', [RestaurantController::class, 'index'])->name('home'); // Changed this route to load data

Route::get('/restaurant/{id}', [RestaurantController::class, 'show'])->name('restaurant.show');

// Static view routes
Route::view('/contact', 'user.contact')->name('contact');
Route::view('/restaurant', 'user.restaurant')->name('user.restaurant');

Route::get('/admin/home', function () {
    return view('admin.Home.RestaurantHome');
})->name('restaurant.home');


// Authentication routes
Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegistrationController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
