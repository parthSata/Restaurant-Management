<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Storage;



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
    public function edit($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $service_type = ['Delivery', 'Dine In', 'Pickup'];
        $statuses = ['active', 'inactive'];
        $currencies = ['USD', 'EUR', 'GBP'];
        $restaurantTypes = ['FastFood', 'CasualDining', 'FineDining'];
    
        // Debugging: Log the variables being passed
    
        return view('admin.Restaurants.AddRestaurant', compact('restaurant', 'service_type', 'statuses', 'currencies', 'restaurantTypes'));
    }
    

    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);
    
        // Validate all the fields including images
        $validatedData = $request->validate([
            'restaurant_name' => 'required|string|max:255',
            'restaurant_slug' => 'required|string|max:255',
            'contact_first_name' => 'required|string|max:255',
            'contact_last_name' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:15',
            'contact_email' => 'required|email|max:255',
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
    
        // Handle logo upload if present
        if ($request->hasFile('logo')) {
            // Optionally delete the old logo here if you want
            if ($restaurant->logo) {
                Storage::delete('public/Uploaded_Images/' . $restaurant->logo);
            }
            $validatedData['logo'] = $request->file('logo')->store('public/Uploaded_Images');
        }
    
        // Handle favicon upload if present
        if ($request->hasFile('favicon')) {
            // Optionally delete the old favicon here if you want
            if ($restaurant->favicon) {
                Storage::delete('public/Uploaded_Images/' . $restaurant->favicon);
            }
            $validatedData['favicon'] = $request->file('favicon')->store('public/Uploaded_Images');
        }
    
        // Handle feature image upload if present
        if ($request->hasFile('feature_image')) {
            // Optionally delete the old feature image here if you want
            if ($restaurant->feature_image) {
                Storage::delete('public/Uploaded_Images/' . $restaurant->feature_image);
            }
            $validatedData['feature_image'] = $request->file('feature_image')->store('public/Uploaded_Images');
        }
    
        // Update the restaurant data with all validated fields
        $restaurant->update($validatedData); 
    
        return redirect()->route('restaurants.index')->with('success', 'Restaurant updated successfully.');
    }
    

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();

        return redirect()->route('restaurants.index')->with('success', 'Restaurant deleted successfully.');
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
    $service_type = ['Delivery', 'Dine In', 'Pickup'];
    $statuses = ['active', 'inactive'];
    $currencies = ['USD', 'EUR', 'GBP'];
    $restaurantTypes = ['FastFood', 'CasualDining', 'FineDining'];

    return view('admin.Restaurants.AddRestaurant', compact('service_type', 'statuses', 'currencies', 'restaurantTypes'));
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
        'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'favicon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'feature_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        $logoPath = $request->file('logo')->store('Uploaded_Images', 'public');
        $restaurant->logo = $logoPath; // Assign the path to the model
    }
    
    if ($request->hasFile('favicon')) {
        $faviconPath = $request->file('favicon')->store('Uploaded_Images', 'public');
        $restaurant->favicon = $faviconPath; // Assign the path to the model
    }
    
    if ($request->hasFile('feature_image')) {
        $featureImagePath = $request->file('feature_image')->store('Uploaded_Images', 'public');
        $restaurant->feature_image = $featureImagePath; // Assign the path to the model
    }

    $restaurant->save();

    return redirect()->route('restaurants.index')->with('success', 'Restaurant created successfully!');
}

    
}
