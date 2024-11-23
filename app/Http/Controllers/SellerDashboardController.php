<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class SellerDashboardController extends Controller
{
    public function index()
    {
        $restaurants =  auth()->user()->restaurants->first();;
        return view('seller.dashboard.sellerDashboard',compact('restaurants')); // Adjust the view path as needed.
    }
}
