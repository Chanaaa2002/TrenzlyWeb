<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->back()->with('success', 'User updated successfully.');
    }

   

    public function destroy($id)
{
    // Find the user by ID
    $user = User::findOrFail($id);

    // Delete the user
    $user->delete();

    // Redirect with success message
    return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
}

}
?>