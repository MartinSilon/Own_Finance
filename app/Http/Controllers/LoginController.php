<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|string|max:8',
        ]);

        $adminPassword = env('ADMIN_PASSWORD');

        if ($request->password === $adminPassword) {
            session(['authenticated' => true]);
            return redirect()->route('home');
        }

        return back()->withErrors([
            'password' => 'Nesprávne heslo.',
        ]);
    }
}
