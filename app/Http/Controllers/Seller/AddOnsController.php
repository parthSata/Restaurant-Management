<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddOnsController extends Controller
{
    public function index()
    {
        // Return the Blade view for Seller Customer
        return view('seller.addOns.AddCategories');
    }

    public function showItems()
    {
        // Return the Blade view for Seller Enquiries
        return view('seller.addOns.AddItems');
    }
}
