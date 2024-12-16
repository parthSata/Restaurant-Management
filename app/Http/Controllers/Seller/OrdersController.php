<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $restaurants =  auth()->user()->restaurants;

        // Return the Blade view for Seller Customer
        return view('seller.orders.orders', compact('restaurants'));
    }
}
