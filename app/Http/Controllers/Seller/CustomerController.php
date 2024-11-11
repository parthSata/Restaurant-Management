<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // Retrieve all restaurants
        $restaurants = Restaurant::all(); // Get all restaurants
    
        // Return the Blade view for Seller Customer with restaurant data
        return view('seller.customers.customer', ['restaurants' => $restaurants]);
    }
    
    public function showEnquiries()
    {
        // Return the Blade view for Seller Enquiries
        return view('seller.customers.enquiries');
    }
}
