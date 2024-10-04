<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        // Return the Blade view for Seller Customer
        return view('seller.reservation.booking');
    }

    public function showTables()
    {
        // Return the Blade view for Seller Enquiries
        return view('seller.reservation.tables');
    }
}
