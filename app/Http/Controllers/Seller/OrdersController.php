<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        // Return the Blade view for Seller Customer
        return view('seller.orders.orders');
    }
}
