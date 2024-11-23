<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuType;
use App\Models\AddOnItem;
use Illuminate\Support\Facades\Storage;
use App\Models\AddedItem; // Make sure this line is present




class MenuController extends Controller
{
    public function index()
    {
        $menuTypes = MenuType::all();
        $restaurants =  auth()->user()->restaurants->first();

        return view('seller.menu.menu', compact('menuTypes','restaurants'));
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

    public function edit($id)
    {
        $menu = MenuType::findOrFail($id); // Fetch the MenuType by ID
        $menuTypes = MenuType::all(); // Get all parent menus (if necessary)

        return view('seller.menu.index', compact('menu', 'menuTypes')); // Pass the data to the view
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
    
    public function create(Request $request)
    {
        $menuId = $request->input('menu_id'); 
        $restaurants =  auth()->user()->restaurants->first();

        if (!$menuId) {
            return redirect()->back()->withErrors('Menu ID is missing.');
        }
    
        // Fetch add-on items that are not added to this menu
        $addOnItems = AddOnItem::whereDoesntHave('menus', function ($query) use ($menuId) {
            $query->where('menu_id', $menuId);
        })->get();
    
        // Fetch added items for the specific menu
        $addedItems = AddedItem::where('menu_id', $menuId)->with('item')->get();
    
        return view('seller.menu.AddItemsinMenu', compact('addOnItems', 'addedItems','restaurants', 'menuId'));
    }   
   
    public function fetchAddOnItems(Request $request)
    {
        $menuId = $request->input('menu_id'); // Get menu_id from the request
    
        // Create a query for add-on items
        $query = AddOnItem::query();
    
        // If there's a search input, filter by the name
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }
    
        // Get the list of add-on items based on the search query (if any)
        $addOnItems = $query->get();
    
        // Fetch added items based on menu_id
        $addedItems = AddedItem::where('menu_id', $menuId)->with('item')->get();
    
        // Return the view with add-on items, added items, and the menu ID
        return view('seller.menu.AddItemsinMenu', compact('addOnItems', 'addedItems', 'menuId'));
    }
    

    public function addItem($id, Request $request)
    {
        $menuId = $request->input('menu_id');
    
        // Check if the item is already added to the menu
        $exists = AddedItem::where('menu_id', $menuId)->where('item_id', $id)->exists();
    
        if ($exists) {
            return redirect()->back()->with('error', 'Item is already added to this menu.');
        }
    
        // Insert into added_items table
        AddedItem::create([
            'menu_id' => $menuId,
            'item_id' => $id,
        ]);
    
        return redirect()->back()->with('success', 'Item added successfully.');
    }
      
    public function removeItem($id, Request $request)
    {
        $menuId = $request->input('menu_id');
    
        // Find the entry in added_items
        $addedItem = AddedItem::where('menu_id', $menuId)->where('item_id', $id)->first();
    
        if ($addedItem) {
            $addedItem->delete();  // Remove the item from added_items table
            return redirect()->back()->with('success', 'Item removed successfully.');
        }
    
        return redirect()->back()->with('error', 'Item not found.');
    }


}
