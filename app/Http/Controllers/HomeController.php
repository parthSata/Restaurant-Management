<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve restaurants from the database
        $restaurants = Restaurant::all();

        // Return the home view with the restaurants data
        return view('home', compact('restaurants'));
    }
}
