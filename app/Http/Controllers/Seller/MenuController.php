<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuType;
use App\Models\AddOnItem;
use Illuminate\Support\Facades\Storage;



class MenuController extends Controller
{
    public function index()
    {
        $menuTypes = MenuType::all();
        return view('seller.menu.menu', compact('menuTypes'));
    }
    public function create()
    {
        return view('seller.menu.AddItems');
    }    
    public function edit($id)
    {
        $menu = MenuType::findOrFail($id); // Fetch the MenuType by ID
        $menuTypes = MenuType::all(); // Get all parent menus (if necessary)
    
        return view('seller.menu.index', compact('menu', 'menuTypes')); // Pass the data to the view
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'parent_menu' => 'nullable|integer|exists:menu_types,id', // Validate parent menu if selected
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
            'parent_id' => $request->parent_menu,  // Insert the selected parent menu ID
            'image' => 'Menu_Images/' . $imageName, // Store the relative path in DB
        ]);
    }

    return redirect()->route('menu.index')->with('success', 'Menu Type created successfully');
}

    public function update(Request $request, $id)
    {
        $menuType = MenuType::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'parent_id' => 'nullable|integer|exists:menu_types,id', // Corrected validation
        ]);

        if ($request->hasFile('image')) {
            if ($menuType->image) {
                Storage::disk('public')->delete($menuType->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('Menu_Images', $imageName, 'public');
            $menuType->image = 'Menu_Images/' . $imageName;
        }

        $menuType->name = $request->name;
        $menuType->parent_id = $request->parent_id; // Ensure this is correctly referenced
        $menuType->save();

        return redirect()->route('menu.index')->with('success', 'Menu Type updated successfully');
    }
    
    public function destroy($id)
    {
        $menuType = MenuType::findOrFail($id);

        // Delete the image file
        Storage::disk('public')->delete($menuType->image);

        // Delete the menu type
        $menuType->delete();

        return redirect()->route('menu.index')->with('success', 'Menu Type deleted successfully');
    }

    public function fetchAddOnItems()
{
    $addOnItems = AddOnItem::all();  // Fetch all items from add_on_items table
    return view('seller.menu.AddItems', compact('addOnItems'));
}

}
