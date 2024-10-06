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
            'category_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $category = Category::findOrFail($id);
        $category->name = $request->category_name;
        $category->description = $request->description;
    
        // Handle image upload for update
        if ($request->hasFile('image')) {
            // Similar image upload logic as in store
            $image = $request->file('image');
            $imageName = Str::slug($request->category_name) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('Categories', $imageName, 'public');
            $category->image = $imagePath; // Save the new image path
        }
    
        $category->save(); // Save the category
    
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }
    
    public function editCategories($id)
    {
        // Find the category by ID or fail
        $category = Category::findOrFail($id);
    
        // Return the edit view with the category data
        return view('categories.edit', compact('category'));
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
