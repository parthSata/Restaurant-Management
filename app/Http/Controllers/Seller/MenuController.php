<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuType;
use Illuminate\Support\Facades\Storage;



class MenuController extends Controller
{
    public function index()
    {
        $menuTypes = MenuType::all();
        return view('seller.menu.menu', compact('menuTypes'));
    }

    // Show the form for creating a new menu type
    public function create()
    {
        return view('seller.menus.create');
    }

    // Store a newly created menu type in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension(); // Get the original extension
            $imageName = time() . '.' . $extension; // Create a unique name with timestamp
    
            // Store image in public/storage/Menu_Images
            $image->storeAs('Menu_Images', $imageName, 'public');
    
            // Store the path in the database
            MenuType::create([
                'name' => $request->name,
                'image' => 'Menu_Images/' . $imageName, // Store the relative path in DB
            ]);
        }
    
        return redirect()->route('menu.index')->with('success', 'Menu Type created successfully');
    }
    

    // Show the form for editing the specified menu type
    public function edit($id)
    {
        $menuType = MenuType::findOrFail($id); // Get the specific menu type
        $menuTypes = MenuType::all(); // Get all menu types for listing in the view
    
        return view('seller.menu.menu', compact('menuType', 'menuTypes')); // Pass both variables to the view
    }
    
    

    // Update the specified menu type in storage
    public function update(Request $request, $id)
{
    $menuType = MenuType::findOrFail($id); // Corrected to singular

    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Handle image upload if a new image is provided
    if ($request->hasFile('image')) {
        // Delete the old image from storage
        Storage::disk('public')->delete($menuType->image);

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension(); // Get the original extension
        $imageName = time() . '.' . $extension; // Create a unique name with timestamp

        // Store new image in public/storage/Menu_Images
        $image->storeAs('Menu_Images', $imageName, 'public');

        // Update the image path in the database
        $menuType->image = 'Menu_Images/' . $imageName;
    }

    // Update the name
    $menuType->name = $request->name;
    $menuType->save();

    return redirect()->route('menu.index')->with('success', 'Menu Type updated successfully');
}

    // Remove the specified menu type from storage
    public function destroy($id)
    {
        $menuType = MenuType::findOrFail($id);

        // Delete the image file
        Storage::disk('public')->delete($menuType->image);

        // Delete the menu type
        $menuType->delete();

        return redirect()->route('menu.index')->with('success', 'Menu Type deleted successfully');
    }
}
