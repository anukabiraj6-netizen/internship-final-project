<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display all categories
    public function index(Request $request)
    {
    $search = $request->search;

    $categories = Category::when($search, function ($query) use ($search) {
        $query->where('category_name', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
    })->latest()->get();

    return view('category.index', compact('categories'));
    }
    // Show create form
    public function create()
    {
        return view('category.create');
    }

    // Store category
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
            'description' => 'nullable',
        ]);

        Category::create([
            'category_name' => $request->category_name,
            'description' => $request->description,
        ]);

        return redirect()->route('category.index')
                         ->with('success', 'Category Added Successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    // Update category
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name,' . $id,
            'description' => 'nullable',
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'category_name' => $request->category_name,
            'description' => $request->description,
        ]);

        return redirect()->route('category.index')
                         ->with('success', 'Category Updated Successfully.');
    }

    // Delete category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('category.index')
                         ->with('success', 'Category Deleted Successfully.');
    }
}
