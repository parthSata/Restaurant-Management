<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AddOnsController extends Controller
{
    public function index()
    {
        $categories = Category::all();

    // Return the Blade view for Seller Customer with categories data
    return view('seller.addOns.AddCategories', compact('categories'));
    }

    public function showItems()
    {
        // Return the Blade view for Seller Enquiries
        return view('seller.addOns.AddItems');
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

    return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
}

public function editCategories($id)
{
    $categoryForUpdate = Category::find($id); // Fetch the category by ID
    if (!$categoryForUpdate) {
        return redirect()->route('categories.index')->with('error', 'Category not found.');
    }
    return view('categories.edit', compact('categoryForUpdate')); // Pass the single category
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
}
