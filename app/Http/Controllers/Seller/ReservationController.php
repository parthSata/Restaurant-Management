<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
                $restaurants =  auth()->user()->restaurants;;

        // Return the Blade view for Seller Customer
        return view('seller.reservation.booking',compact('restaurants'));
    }

    public function showTables()
    {
                $restaurants =  auth()->user()->restaurants;;
        // Return the Blade view for Seller Enquiries
        return view('seller.reservation.tables',compact('restaurants'));
    }
}
