<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\AddOnItem;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;


class AddOnsController extends Controller
{

    // Categories
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



    public function storeItem(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category' => 'required|exists:categories,id', // Ensure the category exists
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $imagePath = null;

        // Store the image if uploaded
        if ($request->hasFile('image')) {
            // Generate a unique filename with the original extension
            $imageName = Str::slug($validated['name']) . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('addOnItems', $imageName, 'public');
        }

        // Create the add-on item
        AddOnItem::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'category_id' => $validated['category'], // Use category_id instead of category
            'image' => $imagePath,
        ]);

        return redirect()->route('addOns.showItems')->with('success', 'Add On Item created successfully');
    }
   // Add this in your SellerAddOnsController
   public function showItems(Request $request)
   {
       // Get the search query from the request
       $searchQuery = $request->input('search', ''); // Default to empty string if no input
       
       // Perform the search on your items
       $items = AddOnItem::with('category') // Eager load category relationship
           ->where('name', 'like', '%' . $searchQuery . '%')
           ->orWhereHas('category', function ($query) use ($searchQuery) {
               $query->where('name', 'like', '%' . $searchQuery . '%');
           })
           ->get();

       // Return the items as JSON
       return response()->json(['data' => $items], 200);
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Allow image updates
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
    
        // Handle the image upload if provided
        if ($request->hasFile('image')) {
            // Get original extension
            $extension = $request->file('image')->getClientOriginalExtension();
    
            // Create a unique file name using time() and the original extension
            $imageName = time() . '.' . $extension;
    
            // Store the image in the 'public/storage/addOnItems' directory
            $imagePath = $request->file('image')->storeAs('public/addOnItems', $imageName);
    
            // Save the image name to the database (the image path can be generated using Storage::url())
            $item->image = 'addOnItems/' . $imageName;
        }
    
        // Save the updated item to the database
        $item->save();
    
        // Redirect back to the item listing or another appropriate route with a success message
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
