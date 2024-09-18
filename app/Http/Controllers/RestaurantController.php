<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        // Fetch all restaurants
        $restaurants = Restaurant::all();

        // Pass the data to the view
        return view('admin.Restaurants.adminrestaurants', compact('restaurants'));
    }

    public function restaurantHome()
    {
        return view('admin.Home.RestaurantHome');
    }

    public function show($id)
    {
        // Fetch restaurant details using the ID
        $restaurant = Restaurant::findOrFail($id);

        // Return the same view as the index but pass only one restaurant
        return view('components.Restaurant.Home.index', compact('restaurant'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'restaurant_name' => 'required|string|max:255',
            'contact_first_name' => 'required|string|max:255',
            'contact_last_name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'service_type' => 'required|string',
            'restaurant_type' => 'required|string',
            'logo' => 'nullable|string',
            'favicon' => 'nullable|string',
            'feature_image' => 'nullable|string',
        ]);

        Restaurant::create($request->all());

        return response()->json(['message' => 'Restaurant created successfully!'], 201);
    }
}
