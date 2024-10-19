<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\AddOnItem;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;



class AddOnsController extends Controller
{
    public function index()
    {
        $categories = Category::all();

    // Return the Blade view for Seller Customer with categories data
    return view('seller.addOns.AddCategories', compact('categories'));
    }

    public function updateCategories(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description; // Make sure to include this

        // Handle image upload for update
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::slug($request->name) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('Categories', $imageName, 'public');
            $category->image = $imagePath; // Save the new image path
        }

        $category->save(); // Save the category

        return redirect()->route('addOns.index')->with('success', 'Category updated successfully.');
    }

    public function editCategories($id)
    {
        $categoryForUpdate = Category::find($id); // Fetch the category by ID
        if (!$categoryForUpdate) {
            return redirect()->route('categories.index')->with('error', 'Category not found.');
        }
        return view('seller.addOns.AddCategories', compact('categoryForUpdate')); // Pass the single category
    }

    public function storeCategories(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imageName = Str::slug($request->name) . '_' . time() . '.' . $image->getClientOriginalExtension();

            $imagePath = $image->storeAs('Categories', $imageName, 'public');

            $category->image = $imagePath;
        }

        $category->save(); // Save the category

        return redirect()->route('addOns.index')->with('success', 'Category created successfully.');
    }

    public function destroyCategory($id)
    {
        $item = Category::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Item deleted successfully!');
    }

    // Items
    

    public function storeItem(Request $request, $menu_id)
    {
        // Validate the input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string', // Description is now optional (nullable)
            'category_id' => 'required|exists:categories,id', // Ensure the category exists
            'menu_id' => 'nullable|exists:menu_types,id', // Validate menu_id (it's nullable now)
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // Image is optional
        ]);
    
        $imagePath = null;
    
        // Handle the image upload if an image is provided
        if ($request->hasFile('image')) {
            // Generate a unique filename with the original extension
            $imageName = Str::slug($validated['name']) . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('uploads/addOnItems', $imageName, 'public'); // Store under "uploads/addOnItems"
        }
    
        // Create the add-on item with the menu_id included
        AddOnItem::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'], // Make sure the category_id field is used
            'menu_id' => $menu_id, // Store the menu_id from the route (if available)
            'image' => $imagePath, // Store image path if available
        ]);
    
        // Redirect back with a success message
        return redirect()->route('addOns.showItems')->with('success', 'Add-On Item created successfully.');
    }

    
// public function showItems(Request $request)
// {
//     $query = $request->get('search');

//     if ($query) {
//         $items = AddOnItem::where('name', 'like', "%{$query}%")
//                           ->orWhere('description', 'like', "%{$query}%")
//                           ->with('category') // Ensure to include the relationship
//                           ->get();
//     } else {
//         $items = AddOnItem::with('category')->get();
//     }

//     return view('seller.addOns.Items', compact('items')); // Return only the items list
// }


public function showItems(Request $request)
{
    $query = $request->get('search');
    
    
    if ($query) {
        $items = AddOnItem::where('name', 'like', "%{$query}%")
                          ->orWhere('description', 'like', "%{$query}%")
                          ->with('category')
                          ->with('category')
                          ->get();
    } else {
        $items = AddOnItem::with('category')->get();
    }

    // Return the HTML for the table rows via AJAX
    if ($request->ajax()) {
        $html = '';
        foreach ($items as $item) {
            $html .= '
                <tr class="border-t border-gray-200">
                    <td class="py-4">
                        <div class="flex items-center">
                            <img src="' . Storage::url($item->image) . '" alt="' . $item->name . '" class="w-10 h-10 rounded-full mr-3">
                            <span class="text-gray-700">' . $item->name . '</span>
                        </div>
                    </td>
                    <td class="py-4">' . $item->category->name . '</td>
                    <td class="py-4">$' . $item->price . '</td>
                    <td class="py-4">
                        <label class="flex items-center cursor-pointer">
                            <div class="relative">
                                <input type="checkbox" class="sr-only" ' . ($item->status ? 'checked' : '') . '>
                                <div class="w-10 h-6 bg-gray-200 rounded-full shadow-inner"></div>
                                <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
                            </div>
                        </label>
                    </td>
                    <td class="py-4">
                        <div class="flex space-x-2">
                            <a href="' . route('items.edit', $item->id) . '" class="text-indigo-600 hover:text-indigo-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </a>
                            <form action="' . route('items.destroy', $item->id) . '" method="POST">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button class="text-red-600 hover:text-red-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            ';
        }

        return response()->json([
            'html' => $html,
        ]);
    }

    return view('seller.addOns.Items', compact('items'));
}
    // Return the HTML for the table rows via AJAX
    if ($request->ajax()) {
        $html = '';
        foreach ($items as $item) {
            $html .= '
                <tr class="border-t border-gray-200">
                    <td class="py-4">
                        <div class="flex items-center">
                            <img src="' . Storage::url($item->image) . '" alt="' . $item->name . '" class="w-10 h-10 rounded-full mr-3">
                            <span class="text-gray-700">' . $item->name . '</span>
                        </div>
                    </td>
                    <td class="py-4">' . $item->category->name . '</td>
                    <td class="py-4">$' . $item->price . '</td>
                    <td class="py-4">
                        <label class="flex items-center cursor-pointer">
                            <div class="relative">
                                <input type="checkbox" class="sr-only" ' . ($item->status ? 'checked' : '') . '>
                                <div class="w-10 h-6 bg-gray-200 rounded-full shadow-inner"></div>
                                <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
                            </div>
                        </label>
                    </td>
                    <td class="py-4">
                        <div class="flex space-x-2">
                            <a href="' . route('items.edit', $item->id) . '" class="text-indigo-600 hover:text-indigo-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </a>
                            <form action="' . route('items.destroy', $item->id) . '" method="POST">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button class="text-red-600 hover:text-red-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            ';
        }

        return response()->json([
            'html' => $html,
        ]);
    }

    return view('seller.addOns.Items', compact('items'));
}




    public function editItems($id)
    {
        // Retrieve the item by its ID
        $item = AddOnItem::find($id);

        // Check if item exists
        if (!$item) {
            return redirect()->route('addOns.index')->with('error', 'Item not found');
        }

        // Assuming you are storing item images in the path 'public/storage/addOnItems'
        $itemImage = asset('storage/addOnItems/' . $item->image);

        // Fetch all categories to display in the select dropdown
        $categories = Category::all();

        // Pass item, image, and categories to the view
        return view('seller.addOns.AddItems', compact('item', 'itemImage', 'categories'));
    }
    public function updateItems(Request $request, $id)
{
    // Validate request data
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'category' => 'required|exists:categories,id', // Validate category
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Retrieve the item by its ID
    $item = AddOnItem::find($id);

    // Check if item exists
    if (!$item) {
        return redirect()->route('addOns.index')->with('error', 'Item not found');
    }

    // Update item details
    $item->name = $request->name;
    $item->description = $request->description;
    $item->price = $request->price;
    $item->category_id = $request->category; // Update the category_id field

    // Handle the image upload if provided
    if ($request->hasFile('image')) {
        // Get original extension
        $extension = $request->file('image')->getClientOriginalExtension();
        // Create a unique file name using time() and the original extension
        $imageName = time() . '.' . $extension;
        // Store the image in the 'public/storage/addOnItems' directory
        $imagePath = $request->file('image')->storeAs('public/addOnItems', $imageName);
        // Save the image name to the database
        $item->image = 'addOnItems/' . $imageName;
    }

    // Save the updated item to the database
    $item->save();

    // Redirect with a success message
    return redirect()->route('addOns.showItems')->with('success', 'Item updated successfully');
}

    public function destroyItems($id)
    {
        $item = AddOnItem::findOrFail($id);

        // Check if the item has an image and delete it from storage
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        // Delete the item from the database
        $item->delete();

        return redirect()->route('addOns.showItems')->with('success', 'Add On Item deleted successfully');
    }
    public function createItems()
    {
        $categories = Category::all(); // Fetch categories from the database
        return view('seller.addOns.AddItems', compact('categories')); // Pass categories to the view
    }

}
