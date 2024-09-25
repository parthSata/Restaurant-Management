<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;



class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');

        // Fetch restaurants based on the search query
        $restaurants = Restaurant::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', "%{$search}%");
        })->get();

        return view('admin.Restaurants.adminrestaurants', compact('restaurants', 'search'));
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

    public function create()
    {
        return view('admin.Restaurants.AddRestaurant');
    }

    public function store(Request $request)
    {
        $request->validate([
            'restaurant_name' => 'required|string|max:255',
            'restaurant_slug' => 'required|string|max:255',
            'contact_first_name' => 'required|string|max:255',
            'contact_last_name' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:15',
            'contact_email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
            'about_us' => 'required|string',
            'short_about' => 'required|string',
            'service_type' => 'required',
            'status' => 'required',
            'currency' => 'required',
            'restaurant_type' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $restaurant = new Restaurant();
    
        $restaurant->restaurant_name = $request->restaurant_name;
        $restaurant->restaurant_slug = $request->restaurant_slug;
        $restaurant->contact_first_name = $request->contact_first_name;
        $restaurant->contact_last_name = $request->contact_last_name;
        $restaurant->contact_phone = $request->contact_phone;
        $restaurant->contact_email = $request->contact_email;
        $restaurant->password = $request->password;
        $restaurant->about_us = $request->about_us;
        $restaurant->short_about = $request->short_about;
        $restaurant->service_type = $request->service_type;
        $restaurant->status = $request->status;
        $restaurant->currency = $request->currency;
        $restaurant->restaurant_type = $request->restaurant_type;
    
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('Upload_Images', 'public');
            $restaurantData['logo'] = $logoPath;
        }
    
        if ($request->hasFile('favicon')) {
            $faviconPath = $request->file('favicon')->store('Upload_Images', 'public');
            $restaurantData['favicon'] = $faviconPath;
        }
    
        if ($request->hasFile('feature_image')) {
            $featureImagePath = $request->file('feature_image')->store('Upload_Images', 'public');
            $restaurantData['feature_image'] = $featureImagePath;
        }
    
        $restaurant->save();
    
        return redirect()->route('restaurants.index')->with('success', 'Restaurant created successfully!');
    }
    
}
