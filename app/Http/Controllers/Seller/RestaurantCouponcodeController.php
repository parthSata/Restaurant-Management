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

public function store(Request $request)
{
    $validatedData = $request->validate([
        'couponName' => 'required|string|max:255',
        'expiryDate' => 'nullable|date',
        'couponType' => 'required|string',
        'daysAvailable' => 'required|string',
        'discount' => 'required|numeric',
        'minOrderAmount' => 'required|numeric',
        'couponOptions' => 'required|string',
        'status' => 'required|string',
    ]);

    RestaurantCouponcode::create($validatedData);

    return redirect()->route('couponcodes.index')->with('success', 'Coupon Code created successfully.');
}

public function edit($id)
{
    $couponCode = RestaurantCouponcode::findOrFail($id);
    return view('couponcodes.edit', compact('couponCode'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'couponName' => 'required|string|max:255',
        'expiryDate' => 'nullable|date',
        'couponType' => 'required|string',
        'daysAvailable' => 'required|string',
        'discount' => 'required|numeric',
        'minOrderAmount' => 'required|numeric',
        'couponOptions' => 'required|string',
        'status' => 'required|string',
    ]);

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
