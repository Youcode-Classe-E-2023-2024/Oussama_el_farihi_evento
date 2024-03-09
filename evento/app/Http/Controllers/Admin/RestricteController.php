<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestricteController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.restricte.index', compact('users'));
    }

    
    public function restrict(Request $request, User $user)
    {
        
        $user->restricted = true;
        $user->save();

        return back()->with('success', 'User restricted successfully.');
    }
}
