<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\CouponCodeController;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\DB;


class CouponController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');

    // Fetch coupons based on the search query
         $coupons = Coupon::when($search, function ($query) use ($search) {
        $query->where('name', 'like', "%{$search}%")
              ->orWhere('type', 'like', "%{$search}%")
              ->orWhere('status', 'like', "%{$search}%");
    })->orderBy('created_at', 'desc')->paginate(10); // Paginate results

    return view('admin.couponCodes.couponcodes', compact('coupons', 'search'));
    }

    // Display a specific coupon by ID
    public function show($id)
    {
        $coupons= Coupon::findOrFail($id); // Find a coupon by ID
        return view('admin.coupons.show', compact('coupons'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'couponName' => 'required|string|max:255',
            'expiryDate' => 'required|date',
            'couponType' => 'required|in:fixed,percentage',
            'discount' => 'required|numeric|min:0',
            'status' => 'required|in:draft,publish',
        ]);
    
        \Log::info('Validation Passed:', $validatedData);
    
        // try {
            // Find the coupon by ID and update
            $coupon = Coupon::findOrFail($id);
            $coupon->update([
                'name' => $validatedData['couponName'], // Updated
                'expiry_date' => $request->expiryDate,
                'type' => $validatedData['couponType'], // Updated
                'discount' => $request->discount,
                'status' => $request->status,
            ]);
    
            return redirect()->route('coupons.index')->with('success', 'Coupon updated successfully.');
        // } catch (\Exception $e) {
        //     \Log::error('Update Coupon Error: ', ['error' => $e->getMessage()]);
        //     return back()->withErrors(['error' => 'An error occurred while updating the coupon.']);
        // }
    }
    
    public function destroy($id)
    {
        try {
            // Find the coupon by ID and delete
            $coupon = Coupon::findOrFail($id);
            $coupon->delete();

            return redirect()->route('coupons.index')->with('success', 'Coupon deleted successfully.');
        } catch (\Exception $e) {
            // Log the error or show an error message
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id); // Correct the model name to 'Coupon'
        
        // Dropdown values for the form
        $statuses = ['draft', 'publish'];
        $couponTypes = ['fixed', 'percentage']; // Coupon type dropdown
        
        // Pass the coupon and other values to the view
        return view('admin.couponCodes.AddCouponcode', compact('coupon', 'statuses',  'couponTypes'));
    }

    public function create()
    {
        $couponTypes = ['fixed', 'percentage']; // Coupon type dropdown
        $statuses = ['draft', 'publish']; // Status dropdown
    
        return view('admin.couponCodes.AddCouponcode', compact('couponTypes', 'statuses'));    }

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
                'name' => $request->couponName,
                'expiry_date' => $request->expiryDate,
                'type' => $request->couponType,
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
