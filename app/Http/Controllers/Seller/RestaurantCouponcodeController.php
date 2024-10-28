<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\RestaurantCouponcode;
use Illuminate\Http\Request;

class RestaurantCouponcodeController extends Controller
{
    public function index()
    {
        $couponCodes = RestaurantCouponcode::all();
        return view('seller.Couponcodes.CouponCodes', compact('couponCodes'));
    }

    public function create()
    {
        return view('seller.Couponcodes.AddRestaurantCouonCodes');
    }

    public function edit($id)
    {
        // Fetch the coupon, or fail if not found
        $coupon = RestaurantCouponcode::findOrFail($id);
        
        // Decode the days_available field into an array
        $daysAvailable = isset($coupon->days_available) ? json_decode($coupon->days_available, true) : [];
    
        // Pass the coupon and daysAvailable to the view
        return view('seller.Couponcodes.AddRestaurantCouonCodes', compact('coupon', 'daysAvailable'));
    }


    public function store(Request $request)
{
    $validatedData = $request->validate([
        'coupon_name' => 'required|string|max:255',
        'expiry_date' => 'nullable|date',
        'coupon_type' => 'required|string',
        'days_available' => 'required|array', // Ensure it's an array
        'discount' => 'required|numeric',
        'min_order_amount' => 'required|numeric',
        'coupon_option' => 'required|string|in:unlimited,once,new_user,custom_limit',
        'status' => 'required|string',
    ]);

    // Convert days_available array to JSON format
    $validatedData['days_available'] = json_encode($validatedData['days_available']);

    RestaurantCouponcode::create($validatedData);

    return redirect()->route('couponcodes.index')->with('success', 'Coupon Code created successfully.');
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'coupon_name' => 'required|string|max:255',
        'expiry_date' => 'nullable|date',
        'coupon_type' => 'required|string',
        'days_available' => 'required|array',
        'discount' => 'required|numeric',
        'min_order_amount' => 'required|numeric',
        'coupon_option' => 'required|string|in:unlimited,once,new_user,custom_limit',
        'status' => 'required|string',
    ]);

    // Convert days_available array to JSON format
    $validatedData['days_available'] = json_encode($validatedData['days_available']);

    $couponCode = RestaurantCouponcode::findOrFail($id);
    $couponCode->update($validatedData);

    return redirect()->route('couponcodes.index')->with('success', 'Coupon Code updated successfully.');
}
public function destroy($id)
{
    $couponCode = RestaurantCouponcode::findOrFail($id);
    $couponCode->delete();

    return redirect()->route('couponcodes.index')->with('success', 'Coupon Code deleted successfully.');
}


}
