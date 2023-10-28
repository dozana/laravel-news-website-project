<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory()
    {
        $categories = Category::latest()->get();
        return view('backend.category.category_all', compact('categories'));
    }

    public function addCategory()
    {
        return view('backend.category.category_add');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        $notification = [
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.category')->with($notification);
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function updateCategory(Request $request)
    {
        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        $notification = [
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.category')->with($notification);
    }
}
