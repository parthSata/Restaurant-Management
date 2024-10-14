<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\AddOnItem;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
    

    // Show items (you can modify this as per your display logic)
    public function showItems()
    {
        $items = AddOnItem::all();
        return view('seller.addOns.Items', compact('items'));
    }

    // Edit Item (use isset for fetching the existing image)
    public function editItem($id)
    {
        $item = AddOnItem::find($id);

        if (isset($item->image)) {
            $itemImage = Storage::url($item->image);
        } else {
            $itemImage = null;
        }

        return view('addOns.editItem', compact('item', 'itemImage'));
    }

    // Update the add on item
    public function updateItem(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category' => 'required|exists:categories,id', // Ensure the category exists
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // Image validation
        ]);
    
        $item = AddOnItem::findOrFail($id);
        $imagePath = $item->image; // Default to existing image
    
        // Check if an image file is uploaded
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
    
            // Generate a unique filename with the original extension
            $imageName = Str::slug($validated['name']) . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('addOnItems', $imageName, 'public');
        }
    
        // Update item details
        $item->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'category_id' => $validated['category'], // Use category_id instead of category
            'image' => $imagePath,
        ]);
    
        return redirect()->route('addOns.showItems')->with('success', 'Add On Item updated successfully');
    }
    
    
    public function editItems($id)
    {
        // Handle editing items
    }

    public function destroyItems($id)
    {
        // Handle deleting items
    }

    public function createItems()
    {
        $categories = Category::all(); // Fetch categories from the database
        return view('seller.addOns.AddItems', compact('categories')); // Pass categories to the view
    }

}
