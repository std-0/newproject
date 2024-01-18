<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AdminRegistrationController extends Controller
{
    public function registerAdmin()
{
    $user = new User;
    $user->name = 'admin';
    $user->email = 'admin@email.com';
    $user->password = bcrypt('123456');
    $user->save();

    
    $user->roles()->attach(Role::where('id', 'admin')->first());

    return redirect('/'); 
}
}
