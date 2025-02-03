<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index'); // Ensure this view exists
    }

    public function update(Request $request)
    {
        // Save settings logic
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}

?>