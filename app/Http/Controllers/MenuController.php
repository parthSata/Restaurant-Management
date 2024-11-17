<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DeliveryAddress;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    // Show menu for a specific restaurant
    public function showMenu($slug)
    {
        $restaurants = Restaurant::where('restaurant_slug', $slug)->firstOrFail();
        $categories = Category::with('addOnItems')->get();

        return view('components.Restaurant.Menu.Restaurant_Menu', [
            'restaurants' => $restaurants,
            'categories' => $categories,
        ]);
    }

    // Checkout page
    public function checkout($slug)
    {
        $restaurants = Restaurant::where('restaurant_slug', $slug)->firstOrFail();
        $user = Auth::user(); // Retrieve the authenticated user
        $fullName = $user->first_name . ' ' . $user->last_name;

        // Retrieve delivery addresses for the user
        $customerId = Auth::id(); // Get the authenticated user's ID
        $addresses = DeliveryAddress::where('customer_id', $customerId)
            ->where('restaurant_id', $restaurants->id)
            ->get();

        return view('components.Restaurant.Checkout.Checkout', compact('restaurants', 'user', 'fullName', 'addresses'));
    }
}
