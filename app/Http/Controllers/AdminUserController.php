<?php

// app/Http/Controllers/AdminUserController.php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();

        return view('admin.users.index', compact('users', 'roles'));
    }

    public function assignRole(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index')->with('success', 'Roluri atribuite cu succes.');
    }
}

