<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Add product to the cart
    public function addToCart(Request $request, $id)
{
    if (!\Illuminate\Support\Facades\Auth::check()) {
        return redirect()->route('login')->with('error', 'Please log in to add products to your cart.');
    }

    $product = Product::findOrFail($id);

    $cart = Session::get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity'] += $request->quantity;
    } else {
        $cart[$id] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'size' => $request->size, 
            'color' => $request->color, 
            'image' => $product->images ? $product->images[0] : null,
        ];
    }

    Session::put('cart', $cart);

    return redirect()->route('cart.view')->with('success', 'Product added to cart successfully.');
}



    // View the cart
    public function index()
    {
        // Retrieve cart data from session or database
        $cart = session()->get('cart', []); 

        // Pass cart data to the view
        return view('pages.cart', compact('cart'));
    }


    // Update cart
    public function updateCart(Request $request, $id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            $cart[$id]['size'] = $request->size;
            $cart[$id]['color'] = $request->color;
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.view')->with('success', 'Cart updated successfully.');
    }

    // Remove product from the cart
    public function removeFromCart($id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.view')->with('success', 'Product removed from cart.');
    }

    // Proceed to checkout
    public function checkout()
    {
        $cart = Session::get('cart', []);
        return view('pages.checkout', compact('cart'));
    }
}
