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
    /**
     * Display a listing of products.
     */
    public function index()
    {
        // Fetch all products with their related categories
        $products = Product::with('category')->get();

        // Fetch all categories for filtering or assignment
        $categories = Category::all();

        // Return the admin.products.index view with the fetched data
        return view('admin.products.index', compact('products', 'categories'));
    }

    public function showProducts()
{
    $products = Product::with('category')->get();
    return view('pages.shop', compact('products'));
}

public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $vendorId = $product->user_id;
        $vendor = User::find($vendorId);

        return view('pages.product-display', compact('product', 'vendor'));
    }


    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        // Fetch all categories to populate the dropdown in the form
        $categories = Category::all();

        // Return the create view
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product in the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'price' => 'required|numeric|min:0',
        //     'category_id' => 'required|exists:categories,_id', // MongoDB `_id`
        //     'stock' => 'required||min:0',
        //     'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        // ]);

        // Handle image uploads
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('products', 'public');
            }
        }

        // Create the product and store it in the database
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id, // Convert to MongoDB ObjectId
            'stock' => $request->stock,
            'size' => explode(' ', $request->size),
            'color' => explode(' ', $request->color),
            'images' => $images, // Store images as JSON
        ]);

        // Redirect back to the product index page with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');
    }

    /**
     * Show the form for editing a product.
     */
    public function edit(Product $product)
{
    // Fetch all categories for the dropdown
    $categories = Category::all();

    // Return the edit view with the product and category data
    return view('admin.products.create', compact('product', 'categories'));
}


    /**
     * Update the specified product in the database.
     */
    public function update(Request $request, Product $product)
{
    // Validate the incoming request
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,_id', // Ensure MongoDB `_id` compatibility
        'stock' => 'required|integer|min:0',
        'size' => 'nullable|string', // Accept as comma-separated string
        'color' => 'nullable|string', // Accept as comma-separated string
        'images' => 'nullable|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Retrieve existing images
    $existingImages = $product->images ?? [];

    // Handle new image uploads
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $existingImages[] = $image->store('products', 'public');
        }
    }

    // Update the product in the database
    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'stock' => $request->stock,
        'size' => explode(' ', $request->size), // Assuming size comes as space-separated string
        'color' => explode(' ', $request->color), // Assuming color comes as space-separated string
        'images' => json_encode($existingImages), // Convert to JSON string
    ]);

    // Redirect back to the product index page with a success message
    return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
}

}
