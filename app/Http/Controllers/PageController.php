<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function mens()
    {
        return view('pages.mens');
    }

    public function womens()
    {
        return view('pages.womens');
    }

    public function acce()
    {
        return view('pages.acce');
    }

    public function about()
    {
        return view('pages.about');
    }
}

