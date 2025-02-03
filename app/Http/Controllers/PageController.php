<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function shop()
{
    $products = Product::with('category')->get();
    return view('shop', compact('products'));
}

    // public function womens()
    // {
    //     return view('pages.womens');
    // }

    public function acce()
    {
        return view('pages.acce');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function userDashboard()
    {
        return view('user.dashboard'); // Ensure this view exists
    }

    public function adminDashboard()
    {
        return view('admin.dashboard'); // Ensure this view exists in resources/views/admin
    }
}

