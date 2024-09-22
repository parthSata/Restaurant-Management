<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon; 


class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all(); // Fetch all coupons from the database
        return view('admin.couponCodes.couponcodes', compact('coupons'));
    }

    // Display a specific coupon by ID
    public function show($id)
    {
        $coupon = Coupon::findOrFail($id); // Find a coupon by ID
        return view('admin.coupons.show', compact('coupon'));
    }
}
