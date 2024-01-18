<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
class LoginController extends Controller
{
    public function show()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"]
        ]);

        if(auth("web")->attempt($data)) {
            if (auth()->user()->hasRole('admin')) {
                return redirect(route("articles.index"));
            } else {
                return redirect(route("home"));
            }
        }

        return redirect(route("login"))->withErrors(["email" => "Пользователь не найден, либо данные введены неверно"]);

    }
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect(route("home"));
    }
}