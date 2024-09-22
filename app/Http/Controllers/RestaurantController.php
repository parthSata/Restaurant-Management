<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
            'restaurant-name' => 'required|string|max:255',
            'restaurant-slug' => 'required|string|max:255|unique:restaurants,slug',
            'contact_first_name' => 'required|string|max:255',
            'contact_last_name' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:15',
            'contact_email' => 'required|email|max:255|unique:restaurants,contact_email',
            'password' => 'required|min:8|confirmed',
            'about_us' => 'required|string',
            'short_about' => 'required|string|max:255',
            'service_type' => 'required|string',
            'status' => 'required|string',
            'currency' => 'required|string',
            'restaurant_type' => 'required|string',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'feature_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_logo.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('Uploaded_Images'), $logoName);
            $data['logo'] = '/Uploaded_Images/' . $logoName;
        }
    
        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $faviconName = time() . '_favicon.' . $favicon->getClientOriginalExtension();
            $favicon->move(public_path('Uploaded_Images'), $faviconName);
            $data['favicon'] = '/Uploaded_Images/' . $faviconName;
        }
    
        if ($request->hasFile('feature_image')) {
            $featureImage = $request->file('feature_image');
            $featureImageName = time() . '_feature_image.' . $featureImage->getClientOriginalExtension();
            $featureImage->move(public_path('Uploaded_Images'), $featureImageName);
            $data['feature_image'] = '/Uploaded_Images/' . $featureImageName;
        }

        // Insert into the database
        Restaurant::create($data);

        // Redirect with success message
        return redirect()->route('restaurants.index')->with('success', 'Restaurant added successfully!');
    }
}
