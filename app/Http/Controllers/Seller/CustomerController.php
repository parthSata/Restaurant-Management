<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // Return the Blade view for Seller Customer
        return view('seller.customers.customer');
    }

    public function showEnquiries()
    {
        // Return the Blade view for Seller Enquiries
        return view('seller.customers.enquiries');
    }
}
