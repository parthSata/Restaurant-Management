<?php

use App\Http\Controllers\Seller\OrdersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Seller\CustomerController as SellerCustomerController;
use App\Http\Controllers\Seller\TransactionController as SellerTransactionController;
use App\Http\Controllers\Seller\ReservationController as SellerReservationController;
use App\Http\Controllers\Seller\AddOnsController as SellerAddOnsController;
use App\Http\Controllers\Seller\MenuController as SellerMenuController;
use App\Http\Controllers\Seller\CouponCodeController as SellerCouponCodesController;
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
    })->name('admin.dashboard');

    // Restaurant Routes
    Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');  // Update this line
    Route::get('/restaurants/create', [RestaurantController::class, 'create'])->name('restaurants.create');
    Route::post('/restaurants/store', [RestaurantController::class, 'store'])->name('restaurants.store');
    Route::get('restaurants/{id}/edit', [RestaurantController::class, 'edit'])->name('restaurants.edit');
    Route::put('/restaurants/{id}', [RestaurantController::class, 'update'])->name('restaurants.update');
    Route::delete('/restaurants/{id}', [RestaurantController::class, 'destroy'])->name('restaurants.destroy');

    // Customer Routes
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');  // Make sure this is present
    // Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
    Route::get('/customers/enquiries', [CustomerController::class, 'showEnquiries'])->name('customers.showEnquiries');


    // Transaction Routes
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transaction/{id}', [TransactionController::class, 'show'])->name('transactions.show');

    // Coupon Routes
    Route::get('coupons', [CouponController::class, 'index'])->name('coupons.index');
    Route::get('coupons/create', [CouponController::class, 'create'])->name('coupons.create');
    Route::post('coupons', [CouponController::class, 'store'])->name('coupons.store');
    Route::get('coupons/{id}/edit', [CouponController::class, 'edit'])->name('coupons.edit');
    Route::put('/coupons/{id}', [CouponController::class, 'update'])->name('coupons.update');
    Route::delete('coupons/{id}', [CouponController::class, 'destroy'])->name('coupons.destroy');
});

Route::prefix('seller')->middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('seller.dashboard.sellerDashboard');
    })->name('seller.sellerDashboard');



    Route::get('/customer', [SellerCustomerController::class, 'index'])->name('customer.index');
    Route::get('/customers/enquiries', [SellerCustomerController::class, 'showEnquiries'])->name('customer.showEnquiries');


    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');

    Route::get('/transaction', [SellerTransactionController::class, 'index'])->name('transaction.index');

    Route::get('/couponcodes', [SellerCouponCodesController::class, 'index'])->name('couponcodes.index');

    Route::get('/reservation', [SellerReservationController::class, 'index'])->name('reservation.index');
    Route::get('/reservation/tables', [SellerReservationController::class, 'showTables'])->name('reservation.showTables');

    Route::get('/addOns', [SellerAddOnsController::class, 'index'])->name('addOns.index'); // View categories
    Route::post('/addOns/categories', [SellerAddOnsController::class, 'storeCategories'])->name('categories.store');
    Route::delete('/addOns/categories/{id}', [SellerAddOnsController::class, 'destroyCategory'])->name('categories.destroy');
    Route::get('/addOns/categories/{id}/edit', [SellerAddOnsController::class, 'editCategories'])->name('categories.edit');
    Route::put('/addOns/categories/{id}', [SellerAddOnsController::class, 'updateCategories'])->name('categories.update');


    // Route::get('/addOns/addItems', [SellerAddOnsController::class, 'showItems'])->name('addOns.showItems'); // View the add items page
    Route::get('/add-ons/items', [SellerAddOnsController::class, 'showItems'])->name('addOns.showItems');
    Route::post('/addOns/addItems/items', [SellerAddOnsController::class, 'storeItem'])->name('items.store'); // Store a new item
    Route::get('/addOns/addItems/items/{id}/edit', [SellerAddOnsController::class, 'editItems'])->name('items.edit'); // Edit an item form
    Route::put('/addOns/addItems/items/{id}', [SellerAddOnsController::class, 'updateItems'])->name('items.update'); // Update an item
    Route::delete('/addOns/addItems/items/{id}', [SellerAddOnsController::class, 'destroyItems'])->name('items.destroy'); // Delete an item
    Route::get('/addOns/addItems/create', [SellerAddOnsController::class, 'createItems'])->name('items.create');

   // Menu Routes
   Route::get('/menu', [SellerMenuController::class, 'index'])->name('menu.index'); // View all menus
   Route::get('/menu/create', [SellerMenuController::class, 'create'])->name('menu.create'); // Create a menu form
   Route::post('/menu', [SellerMenuController::class, 'store'])->name('menu.store'); // Store a new menu
   Route::get('/menu/{id}/edit', [SellerMenuController::class, 'edit'])->name('menu.edit'); // Edit a menu form
   Route::put('/menu/{id}', [SellerMenuController::class, 'update'])->name('menu.update'); // Update a menu
   Route::delete('/menu/{id}', [SellerMenuController::class, 'destroy'])->name('menu.destroy'); // Delete a menu

    // Add/Remove Items from Menu Routes
    Route::get('/menu/add-items', [SellerMenuController::class, 'fetchAddOnItems'])->name('menu.addItems'); // View items to add to a menu
    Route::post('/menu/add-item/{id}', [SellerMenuController::class, 'addItem'])->name('menu.addItem'); // Add an item to the menu
    Route::post('/menu/remove-item/{id}', [SellerMenuController::class, 'removeItem'])->name('menu.removeItem'); // Remove an item from the menu
   
   
});