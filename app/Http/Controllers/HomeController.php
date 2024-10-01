<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class HomeController extends Controller
{
    public function index($id = null)
    {
        if ($id) {
            // If an ID is provided, fetch the specific restaurant
            $restaurant = Restaurant::find($id);

            if (!$restaurant) {
                return redirect()->back()->with('error', 'Restaurant not found');
            }

            return view('user.restaurant', compact('restaurant'));
        } else {
            // If no ID, show a list of all restaurants (for the home page)
            $restaurants = Restaurant::all();

            return view('user.home', compact('restaurants'));
        }
    }
}
