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
        return view('seller.menu.menu', compact('menuTypes'));
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
    public function create(Request $request)
    {
        // Assuming you get the menu_id from the request or any other source
        $menuId = $request->input('menu_id'); // Or any logic to set the menu ID
    
        // Fetch add-on items that are not added
        $addOnItems = AddOnItem::where('is_added', 0)->get();
        
        // Fetch added items
        $addedItems = AddOnItem::where('is_added', 1)->get();
    
        return view('seller.menu.AddItemsinMenu', compact('addOnItems', 'addedItems', 'menuId')); // Include $menuId here
    }
    
    
   
    public function fetchAddOnItems(Request $request)
    {
        $menuId = $request->input('menu_id'); // Get menu_id from the request
        $query = AddOnItem::where('is_added', 0);
    
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }
    
        $addOnItems = $query->get();
        $addedItems = AddedItem::where('menu_id', $menuId)->with('item')->get(); // Fetch added items based on menu_id
    
        return view('seller.menu.AddItemsinMenu', compact('addOnItems', 'addedItems', 'menuId')); // Include $menuId here
    }
    
    


        
public function addItem($id, Request $request)
{
    $menuId = $request->input('menu_id'); // Get the menu ID from the request
    $item = AddOnItem::findOrFail($id); // Find the item

    // Mark the item as added
    $item->is_added = 1; 
    $item->save();

    // Create a new entry in the added_items table
    AddedItem::create([
        'menu_id' => $menuId,
        'item_id' => $item->id,
    ]);

    return redirect()->route('menu.addItems')->with('success', 'Item added to the list.');
}



public function removeItem($id, Request $request)
{
    $item = AddOnItem::findOrFail($id);
    $item->is_added = 0; // Mark as not added
    
    $item->save();

    return redirect()->route('menu.addItems')->with('success', 'Item removed from the list.');
}


    
}
