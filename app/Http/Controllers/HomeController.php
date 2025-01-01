<?php

namespace App\Http\Controllers;

use App\Models\AddOnItem;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class HomeController extends Controller
{
    public function index($id = null)
    {
        if ($id) {
            // Fetch a specific restaurant by ID
            $restaurant = Restaurant::find($id);
    
            if (!$restaurant) {
                return redirect()->back()->with('error', 'Restaurant not found');
            }
    
            return view('user.restaurant', compact('restaurant'));
        } else {
            // Show all restaurants for the home page
            $restaurants = Restaurant::all();
    
            // Fetch 4 random products associated with this restaurant (if a relationship exists)
            $specialMenuItems = AddOnItem::inRandomOrder()->take(4)->get();


        return view('user.home', compact('restaurants','specialMenuItems'));
        }
    }

}
