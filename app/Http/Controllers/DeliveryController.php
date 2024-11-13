<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAddress;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function store(Request $request, $slug)
    {
        // Get the logged-in user's ID
        $customerId = Auth::id();
        if (!$customerId) {
            return redirect()->route('login')->with('error', 'Please log in to continue');
        }
        
        // Retrieve the restaurant by its slug
        // $restaurant = Restaurant::where('restaurant_slug', $slug)->firstOrFail();
        $restaurant = Restaurant::where('restaurant_slug', $slug)->first();
        if (!$restaurant) {
            return redirect()->route('restaurants.index')->with('error', 'Restaurant not found');
        }
        // Validate the delivery address data
        $request->validate([
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'zip_code' => 'required|string|max:20',
        ]);
    
        // Store the delivery address with the customer_id and restaurant_id
        $delivery = new DeliveryAddress();
        $delivery->customer_id = $customerId; // Make sure this links to the customer correctly
        $delivery->restaurant_id = $restaurant->id;
        $delivery->address = $request->address;
        $delivery->city = $request->city;
        $delivery->zip_code = $request->zip_code;
        $delivery->save();
    
        return redirect()->route('checkout', ['slug' => $slug])->with('success', 'Delivery address saved successfully!');
    }
    
    public function show($slug)
    {
        $customerId = Auth::id();
        $user = Auth::user();  // Retrieve the authenticated user
        $fullName = $user->first_name . ' ' . $user->last_name;
        
        // Retrieve the restaurant by its slug
        $restaurants = Restaurant::where('restaurant_slug', $slug)->firstOrFail();
        
        // Fetch all delivery addresses for the logged-in user and the given restaurant
        $addresses = DeliveryAddress::where('customer_id', $customerId)
                                    ->where('restaurant_id', $restaurants->id)
                                    ->get();
        
        // Optional: Check if addresses are found
        if ($addresses->isEmpty()) {
            return redirect()->back()->with('error', 'No delivery addresses found.');
        }
        
        // Pass user details to the view
        return view('checkout', compact('restaurants', 'addresses', 'user', 'fullName'));
    }
    
    
    
}
