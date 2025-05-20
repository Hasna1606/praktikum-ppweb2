<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view("login");
    }
    Public function loginPost(Request $request)
    {
        if(Auth::attempt([
            "email" => $request->email,
            "password" => $request->password,
        ])) {
            $user = User::where("email", $request->email)->first();
            Auth::login($user);
            return redirect('/');
        }
    }
}

