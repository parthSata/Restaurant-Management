<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\DB;


class CouponController extends Controller
{
    public function index()
    {
        // Fetch all coupons from the database
        $coupons = Coupon::all(); 
        return view('admin.couponCodes.couponcodes', compact('coupons')); // Corrected compact variable 'coupons'
    }

    // Display a specific coupon by ID
    public function show($id)
    {
        $coupons= Coupon::findOrFail($id); // Find a coupon by ID
        return view('admin.coupons.show', compact('coupons'));
    }

    public function create()
    {
        return view('admin.couponCodes.AddCouponcode'); // Ensure this view exists at the correct path
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'couponName' => 'required|string|max:255',
            'expiryDate' => 'required|date',
            'couponType' => 'required|in:fixed,percentage',
            'discount' => 'required|numeric|min:0',
            'status' => 'required|in:draft,publish',
        ]);

        try {
            DB::table('coupons')->insert([
                'coupon_name' => $request->couponName,
                'expiry_date' => $request->expiryDate,
                'coupon_type' => $request->couponType,
                'discount' => $request->discount,
                'status' => $request->status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('coupons.create')->with('success', 'Coupon added successfully.');
        } catch (\Exception $e) {
            // Log the error or show an error message
            return back()->withErrors(['error' => $e->getMessage()]);
        }
        
    }

}
