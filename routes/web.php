<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\HomeController;

// View Routes

Route::get('/', function () {
    return view('user.home');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/contact', function () {
    return view('user.contact');
});

Route::get('/restaurant', function () {
    return view('user.restaurant');
});

Route::get('/dbconn', function () {
    return view('Connection.dbConn');
});

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');

// Route for a specific restaurant's detail page
Route::get('/restaurant/{id}', [RestaurantController::class, 'show'])->name('restaurant.show');

// Controllers

Route::get('register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegistrationController::class, 'register']);


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

