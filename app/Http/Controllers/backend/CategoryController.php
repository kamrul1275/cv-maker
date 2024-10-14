<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; 

class CategoryController extends Controller
{
    function createCategory(){

        return view("backend.category.add");
    }//end method



    function allCategory(){

        $categories=Category::get();
        return view('backend.category.all_category',compact('categories'));
    }//end method

    function storeCategory(Request $request){
        // Validate the request
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Store the image
        if ($request->hasFile('category_image')) {
            $category_image = $request->file('category_image')->store('category_images', 'public');
        } else {
            return redirect()->back()->withErrors(['category_image' => 'Image upload failed']);
        }
    
        // Create the category
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_image = $category_image;
        $category->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Category created successfully!');
    }
}
