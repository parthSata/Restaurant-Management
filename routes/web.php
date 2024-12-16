<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Seller\OrdersController;
use App\Http\Controllers\SellerDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RestaurantController as adminRestaurantController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Seller\CustomerController as SellerCustomerController;
use App\Http\Controllers\Seller\TransactionController as SellerTransactionController;
use App\Http\Controllers\Seller\ReservationController as SellerReservationController;
use App\Http\Controllers\Seller\AddOnsController as SellerAddOnsController;
use App\Http\Controllers\Seller\MenuController as SellerMenuController;
use App\Http\Controllers\Seller\RestaurantCouponcodeController as SellerCouponCodesController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\HomeController;

// Public Restaurant Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home/{id}', [HomeController::class, 'index'])->name('Home.index');

Route::get('/restaurants', [adminRestaurantController::class, 'userIndex'])->name('restaurants.user.index');
Route::get('/restaurant/{slug}', [adminRestaurantController::class, 'show'])->name('restaurant.show');
Route::get('/restaurant-home', [adminRestaurantController::class, 'restaurantHome'])->name('restaurant.home');

// Static View Routes (For User)
Route::view('/contact', 'user.contact')->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');


// Authentication Routes
Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegistrationController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Admin Routes
Route::middleware(['auth:web'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Customer Routes
Route::middleware(['auth:web'])->group(function () {
    Route::get('/customer/dashboard', function () {
        return view('customer.dashboard');
    })->name('customer.dashboard');
});

//  (For Restaurant)
Route::get('/contactUs/{id}', [adminRestaurantController::class, 'contactUs'])->name('contact');
Route::get('/aboutUs/{id}', [adminRestaurantController::class, 'aboutUs'])->name('about');
Route::get('/menu/{id}', [adminRestaurantController::class, 'menu'])->name('menu');
Route::get('/reservation/{id}', [adminRestaurantController::class, 'reservation'])->name('reservation');
// Route::get('/restaurant/{slug}/menu', [MenuController::class, 'showMenu'])->name('restaurant');




// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Restaurant Routes
    Route::get('/restaurants', [adminRestaurantController::class, 'index'])->name('restaurants.index');  // Update this line
    Route::get('/restaurants/create', [adminRestaurantController::class, 'create'])->name('restaurants.create');
    Route::post('/restaurants/store', [adminRestaurantController::class, 'store'])->name('restaurants.store');
    Route::get('restaurants/{id}/edit', [adminRestaurantController::class, 'edit'])->name('restaurants.edit');
    Route::put('/restaurants/{id}', [adminRestaurantController::class, 'update'])->name('restaurants.update');
    Route::delete('/restaurants/{id}', [adminRestaurantController::class, 'destroy'])->name('restaurants.destroy');

    // Customer Routes
    Route::get('/customers', [ContactController::class, 'index'])->name('customers.index'); // List customers
    Route::delete('/customers/{id}', [ContactController::class, 'destroy'])->name('customers.destroy'); // Delete customer

    // Enquiries Routes
    Route::get('/customers/enquiries', [ContactController::class, 'showEnquiries'])->name('customers.showEnquiries'); // List enquiries
    Route::delete('/customers/enquiries/{id}', [ContactController::class, 'deleteEnquiry'])->name('customers.deleteEnquiry'); // Delete enquiry

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

    
// Seller
Route::prefix('seller')->middleware('auth:restaurant')->group(function () {

    Route::get('/dashboard', [SellerDashboardController::class, 'index'])->name('seller.sellerDashboard');

    Route::get('/customer', [SellerCustomerController::class, 'index'])->name('customer.index');
    Route::delete('/customers/{id}', [ContactController::class, 'destroy'])->name('customer.destroy'); // Delete customer

    
    Route::get('/customer/enquiries', [SellerCustomerController::class, 'showEnquiries'])->name('customer.showEnquiries');
    Route::delete('/customer/enquiries/{id}', [SellerCustomerController::class, 'deleteEnquiry'])->name('customer.deleteEnquiry'); // Delete enquiry



    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');

    Route::get('/transaction', [SellerTransactionController::class, 'index'])->name('transaction.index');

    Route::get('/reservation', [SellerReservationController::class, 'index'])->name('reservation.index');
    Route::get('/reservation/tables', [SellerReservationController::class, 'showTables'])->name('reservation.showTables');

    Route::get('/addOns', [SellerAddOnsController::class, 'index'])->name('addOns.index');
    Route::post('/addOns/categories', [SellerAddOnsController::class, 'storeCategories'])->name('categories.store');
    Route::get('/addOns/categories/{id}/edit', [SellerAddOnsController::class, 'editCategories'])->name('categories.edit');
    Route::put('/addOns/categories/{id}', [SellerAddOnsController::class, 'updateCategories'])->name('categories.update');
    Route::delete('/addOns/categories/{id}', [SellerAddOnsController::class, 'destroyCategory'])->name('categories.destroy');
    

    Route::get('/add-ons/items', [SellerAddOnsController::class, 'showItems'])->name('addOns.showItems');
    Route::get('/addOns/addItems/create/{menu_id}', [SellerAddOnsController::class, 'createItems'])->name('items.create');

    Route::post('/addOns/addItems/items', [SellerAddOnsController::class, 'storeItem'])->name('items.store');
    Route::get('/addOns/addItems/items/{id}/edit', [SellerAddOnsController::class, 'editItems'])->name('items.edit'); // Edit an item form
    Route::put('/addOns/addItems/items/{id}', [SellerAddOnsController::class, 'updateItems'])->name('items.update'); // Update an item
    Route::delete('/addOns/addItems/items/{id}', [SellerAddOnsController::class, 'destroyItems'])->name('items.destroy'); // Delete an item
    Route::get('/addOns/addItems/create', [SellerAddOnsController::class, 'createItems'])->name('items.create');

    // Menu Routes
    Route::get('/menu', [SellerMenuController::class, 'index'])->name('menu.index'); // View all menus
    Route::get('/menu/create', [SellerMenuController::class, 'create'])->name('menu.create');
    Route::post('/menu', [SellerMenuController::class, 'store'])->name('menu.store'); // Store a new menu
    Route::get('/menu/{id}/edit', [SellerMenuController::class, 'edit'])->name('menu.edit'); // Edit a menu form
    Route::put('/menu/{id}', [SellerMenuController::class, 'update'])->name('menu.update'); // Update a menu
    Route::delete('/menu/{id}', [SellerMenuController::class, 'destroy'])->name('menu.destroy'); // Delete a menu
    

      // Add/Remove Items from Menu Routes
    Route::get('/menu/add-items', [SellerMenuController::class, 'fetchAddOnItems'])->name('menu.addItems'); // View items to add to a menu
    Route::post('/menu/{id}/addItem', [SellerMenuController::class, 'addItem'])->name('menu.addItem');
    Route::post('/menu/remove-item/{id}', [SellerMenuController::class, 'removeItem'])->name('menu.removeItem'); // Remove an item from the menu
   
    // Coupon Codes Seller Side
    Route::get('/couponcodes', [SellerCouponCodesController::class, 'index'])->name('couponcodes.index'); // List all coupon codes
    Route::get('/couponcodes/create', [SellerCouponCodesController::class, 'create'])->name('couponcodes.create'); // Show create form
    Route::post('/couponcodes', [SellerCouponCodesController::class, 'store'])->name('couponcodes.store'); // Store a new coupon code
    Route::get('/couponcodes/{id}/edit', [SellerCouponCodesController::class, 'edit'])->name('couponcodes.edit'); // Show edit form
    Route::put('/couponcodes/{id}', [SellerCouponCodesController::class, 'update'])->name('couponcodes.update'); // Update a coupon code
    Route::delete('/couponcodes/{id}', [SellerCouponCodesController::class, 'destroy'])->name('couponcodes.destroy'); 
});

// Customer
Route::prefix('customer')->middleware('auth')->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/orders/{id}', [CustomerController::class, 'orders'])->name('customer.orders');
    Route::post('/logout', [CustomerController::class, 'logout'])->name('customer.logout'); // Logout route

    Route::get('/checkout/{slug}', [MenuController::class, 'checkout'])->name('checkout');
    Route::post('/delivery/store/{slug}', [DeliveryController::class, 'store'])->name('delivery.store');
    Route::post('/checkout/process/{slug}', [DeliveryController::class, 'processCheckout'])->name('checkout.process');
    
    Route::post('/cart/sync', [MenuController::class, 'syncCart'])->name('syncCart');
    Route::post('/payment/handle/{slug}', [DeliveryController::class, 'handlePayment'])->name('payment.handle');
    Route::get('/order/confirmation/{slug}', [DeliveryController::class, 'confirmation'])->name('order.confirmation');
    Route::get('/restaurant/{slug}/menu', [MenuController::class, 'showMenu'])->name('restaurant');
});
