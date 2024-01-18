<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    
    public function edit(int $id)
    {
        $user = User::findOrFail($id);

        $roles = Role::all(); 
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:users,email,' . $id,
            'roles' => 'numeric',
        ]);
        
    
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('roles'),
        ]);
    
        return redirect()->route('users.index')->with('success', 'Utilizatorul a fost actualizat cu succes.');
    }


    public function destroy(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilizatorul a fost șters cu succes.');
       
    }

    public function assignRole(int $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.assignRole', compact('user', 'roles'));
    }

    public function processRoleAssignment(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'roles' => 'array',
            'roles.*' => 'exists:roles,id', 
        ]);

        $user->roles()->sync($request->roles);

        return redirect()->route('users.index')->with('success', 'Rolurile au fost atribuite cu succes.');
    }
}
