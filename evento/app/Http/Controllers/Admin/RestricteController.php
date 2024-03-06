<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestricteController extends Controller
{
    public function index(){
        $users = User::all(); // Fetch all users
        return view('admin.restricte.index', compact('users'));
    }

    // Method to update user restriction status
    public function restrict(Request $request, User $user)
    {
        // Here, you might want to update a 'restricted' field on the user or handle restriction logic
        $user->restricted = true; // Example field, ensure your User model has this attribute or relevant logic
        $user->save();

        return back()->with('success', 'User restricted successfully.');
    }
}
