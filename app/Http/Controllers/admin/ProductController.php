<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use MongoDB\BSON\ObjectId;
use App\Models\User;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
    
        // Debugging: Log the data to check if it's being fetched
        Log::info("Products: " . json_encode($products));
        Log::info("Categories: " . json_encode($categories));
    
        return view('admin.products.index', compact('products', 'categories'));
    }


    public function showProducts()
    {
        // Fetch all products with their categories
        $products = Product::with('category')->get();
        return view('pages.shop', compact('products'));
    }

    // Display a single product by its ID
    public function show($id)
    {
        // Fetch the product by ID with its category
        $product = Product::with('category')->findOrFail($id);
        $vendorId = $product->user_id;
        $vendor = User::find($vendorId);
        return view('pages.product-display', compact('product', 'vendor'));
    }


    public function create()
{
    $categories = Category::all(); // Fetch all categories
    return view('admin.products.create', compact('categories'));
}


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,_id', // MongoDB uses `_id`
            'stock' => 'required|integer|min:0',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('products', 'public');
            }
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id, // Convert to MongoDB ObjectId
            'stock' => $request->stock,
            'size' => $request->size,
            'color' => $request->color,
            'images' => !empty($images) ? json_encode($images) : null,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
            'stock' => 'required|integer',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Update product fields
        $product->update($validatedData);
    
        // Handle images if provided
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $imagePaths[] = $path;
            }
            $product->images = json_encode($imagePaths);
            $product->save();
        }
    
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }
    
    public function destroy(Product $product)
    {
        if (!empty($product->images)) {
            foreach (json_decode($product->images) as $image) {
                if (Storage::exists("public/$image")) {
                    Storage::delete("public/$image");
                }
            }
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
