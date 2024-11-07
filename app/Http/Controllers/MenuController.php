<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
       public function showMenu($id)
{
    $restaurants = Restaurant::findOrFail($id);
    $categories = Category::with('addOnItems')->get();
    
    return view('components.Restaurant.Menu.Restaurant_Menu', [
        'restaurant' => $restaurants, // Make sure this matches the variable name in the view
        'restaurantId' => $id,
        'categories' => $categories,
    ]);
}      
}
