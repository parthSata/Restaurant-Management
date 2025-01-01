<?php

namespace App\Http\Controllers;

use App\Models\AddOnItem;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Storage;



class RestaurantController extends Controller
{
    public function userIndex(Request $request)
    {
        // Get the search query from the request (if any)
        $search = $request->input('search');
    
        // Fetch all restaurants or filter based on the search query
        $restaurants = Restaurant::when($search, function ($query) use ($search) {
            return $query->where('restaurant_name', 'like', "%{$search}%");
        })->get();
    
        // Fetch 4 random AddOnItems for the special menu
        $specialMenuItems = AddOnItem::inRandomOrder()->take(4)->get();
    
        // Pass the variables to the view
        return view('user.restaurant', compact('restaurants', 'search' ,'specialMenuItems'));
    }
    public function contactUs($id)
    {
        $restaurants = Restaurant::findOrFail($id);    
        return view('components.Restaurant.ContactUs.contact', compact('restaurants'));
    }
    public function menu($id)
    {
        $restaurants = Restaurant::findOrFail($id);    
        return view('components.Restaurant.Menu.Restaurant_Menu', compact('restaurants'));
    }
    public function aboutUs($id)
    {
        $restaurants = Restaurant::findOrFail($id);    
        return view('components.Restaurant.About.about', compact('restaurants'));
    }
    public function reservation($id)
    {
        $restaurants  = Restaurant::findOrFail($id);
    
        return view('components.Restaurant.reservation.reservation', compact('restaurants'));
    }
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
    public function show($slug = null)
    {
        // Check if a slug is provided
        if ($slug) {
            // Fetch restaurant details using the slug
            $restaurants = Restaurant::where('restaurant_slug', $slug)->first();
    
            // Fetch 4 random products associated with this restaurant (if a relationship exists)
            $specialMenuItems = AddOnItem::inRandomOrder()->take(4)->get();
            $categories = Category::where('restaurant_id', $restaurants->id)->get();

            return view('components.Restaurant.Home.index', compact('restaurants','categories','specialMenuItems'));
        } else {
            // Fetch all restaurants to display
            $restaurants = Restaurant::all();
            return view('user.restaurant', compact('restaurants'));
        }
    }   
    public function restaurantHome()
    {
        return view('admin.Home.RestaurantHome');
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();
        
        return redirect()->route('restaurants.index')->with('success', 'Restaurant deleted successfully.');
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
        // Find the restaurant by ID
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
            // Optionally delete the old logo if it exists
            if ($restaurant->logo) {
                Storage::delete('public/Uploaded_Images/' . $restaurant->logo);
            }
            
            // Generate a custom name for the logo
            $logoName = time() . '-' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('public/Uploaded_Images', $logoName);
            $validatedData['logo'] = $logoName;  // Save the new file name to the database
        }
    
        // Handle favicon upload if present
        if ($request->hasFile('favicon')) {
            // Optionally delete the old favicon if it exists
            if ($restaurant->favicon) {
                Storage::delete('public/Uploaded_Images/' . $restaurant->favicon);
            }
            
            // Generate a custom name for the favicon
            $faviconName = time() . '-' . $request->file('favicon')->getClientOriginalName();
            $request->file('favicon')->storeAs('public/Uploaded_Images', $faviconName);
            $validatedData['favicon'] = $faviconName;  // Save the new file name to the database
        }
    
        // Handle feature image upload if present
        if ($request->hasFile('feature_image')) {
            // Optionally delete the old feature image if it exists
            if ($restaurant->feature_image) {
                Storage::delete('public/Uploaded_Images/' . $restaurant->feature_image);
            }
            
            // Generate a custom name for the feature image
            $featureImageName = time() . '-' . $request->file('feature_image')->getClientOriginalName();
            $request->file('feature_image')->storeAs('public/Uploaded_Images', $featureImageName);
            $validatedData['feature_image'] = $featureImageName;  // Save the new file name to the database
        }
    
        // Update the restaurant data with all validated fields
        $restaurant->update($validatedData); 
    
        return redirect()->route('restaurants.index')->with('success', 'Restaurant updated successfully.');
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
        
        // Convert the slug to lowercase and replace spaces with hyphens
        $restaurant->restaurant_slug = strtolower(str_replace(' ', '-', $request->restaurant_slug));
        
        $restaurant->contact_first_name = $request->contact_first_name;
        $restaurant->contact_last_name = $request->contact_last_name;
        $restaurant->contact_phone = $request->contact_phone;
        $restaurant->contact_email = $request->contact_email;
        $restaurant->password = Hash::make($request->password);
        $restaurant->about_us = $request->about_us;
        $restaurant->short_about = $request->short_about;
        $restaurant->service_type = $request->service_type;
        $restaurant->status = $request->status;
        $restaurant->currency = $request->currency;
        $restaurant->restaurant_type = $request->restaurant_type;
    
        // Store logo with the original filename
        if ($request->hasFile('logo')) {
            $logoName = time() . '-' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('Uploaded_Images', $logoName, 'public');
            $restaurant->logo = $logoName;
        }
    
        // Store favicon with the original filename
        if ($request->hasFile('favicon')) {
            $faviconName = time() . '-' . $request->file('favicon')->getClientOriginalName();
            $request->file('favicon')->storeAs('Uploaded_Images', $faviconName, 'public');
            $restaurant->favicon = $faviconName;
        }
    
        // Store feature image with the original filename
        if ($request->hasFile('feature_image')) {
            $featureImageName = time() . '-' . $request->file('feature_image')->getClientOriginalName();
            $request->file('feature_image')->storeAs('Uploaded_Images', $featureImageName, 'public');
            $restaurant->feature_image = $featureImageName;
        }
    
        $restaurant->save();
    
        return redirect()->route('restaurants.index')->with('success', 'Restaurant created successfully!');
    }  

}
