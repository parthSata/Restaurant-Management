<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index()
{
    // Fetch all restaurants from the database
    $restaurants = Restaurant::all();

    // Return the home view with the restaurants data
    return view('home', compact('restaurants'));
}

    // Display a specific restaurant's details
    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id); // Fetch the restaurant by ID
        return view('Home.index', compact('restaurant'));
    }
}

