<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MenuController extends Controller
{
    
    public function showMenu($slug)
    {
        $restaurants =  Restaurant::where('restaurant_slug', $slug)->firstOrFail();
        $categories = Category::with('addOnItems')->get();
        
        return view('components.Restaurant.Menu.Restaurant_Menu', [
            'restaurants' => $restaurants, // Make sure this matches the variable name in the view
            'categories' => $categories,
        ]);
    }     
    
    public function checkout($slug)
    {
        $restaurants = Restaurant::where('restaurant_slug', $slug)->first();
        $user = Auth::user();  // Retrieve the authenticated user
        $fullName = $user->first_name . ' ' . $user->last_name;
        if (!$restaurants) {
            abort(404); // Return a 404 error if the restaurant is not found
        }
    
        // Pass user details to the view
        return view('components.Restaurant.Checkout.checkout', compact('restaurants', 'user' , 'fullName'));
    }
    
    
}
