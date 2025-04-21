<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function halamanLogin()
    {
        $configuration = Configuration::first();
        return view('welcome', compact('configuration'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->remember)) {
            return redirect()->route('dashboard.admin')->with('loginSuccess', 'Selamat datang');
        }

        return back()->with('loginError', 'Email atau Password salah.');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/welcome')->with('success', 'Anda berhasil logout.');
    }
}
