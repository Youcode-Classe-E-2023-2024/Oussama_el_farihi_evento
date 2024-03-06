<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $users = User::all();
        $roles = Role::all();
        return view('admin.roles.index', compact('users', 'roles'));
    }

    public function assign(Request $request)
{
    $user = User::findOrFail($request->user_id);
    $role = Role::findById($request->role_id); // Use findById to fetch the role model by ID

    if (!$role) {
        return back()->withErrors(['role' => 'Role does not exist.']);
    }

    $user->syncRoles($role); // Sync using the role model

    return back()->with('success', 'Role assigned successfully!');
}


}
