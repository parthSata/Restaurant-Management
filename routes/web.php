<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/login', function () {
    return view('auth.login');
});
Route::post('/login', [AuthController::class, 'auth.login']);

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/', function () {
    return view('user.home');
});
Route::get('/restaurant', function () {
    return view('user.restaurant');
});


Route::get('/register', [AuthController::class, 'showRegistrationForm']);
Route::post('/register', [AuthController::class, 'register']);



