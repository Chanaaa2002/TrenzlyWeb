<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
{
    $categories = Category::all();
    return view('admin.categories.index', compact('categories'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    Category::create($request->all());
    return redirect()->route('admin.categories.index')->with('success', 'Category added successfully!');
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $category = Category::findOrFail($id);
    $category->update($request->all());
    return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
}

public function destroy($id)
{
    Category::findOrFail($id)->delete();
    return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
}


}
