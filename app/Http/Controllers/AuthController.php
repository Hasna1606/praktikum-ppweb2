<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('login');
    }
    public function login(Request $request): RedirectResponse
    {
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])){
            $user = User::where(['email' => $request->email])->first();
            Auth::login($user);
            return redirect('/');
        }

        return redirect('login')->with('error', 'email dan password tidak sesuai');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
