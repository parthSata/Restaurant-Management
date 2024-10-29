<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function showMenu($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $categories = Category::with('addOnItems')->get(); // Rename variable
    
        return view('components.Restaurant.Menu.Restaurant_Menu', [
            'restaurant' => $restaurant,
            'restaurantId' => $id,
            'categories' => $categories, // Use this variable name in the view
        ]);
    }
    
       
}
