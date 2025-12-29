<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // =====================
    // HALAMAN LOGIN KASIR
    // =====================
    public function showLoginKasir()
    {
        return view('auth.login-kasir');
    }

    // =====================
    // PROSES LOGIN KASIR
    // =====================
    public function loginKasir(Request $request)
    {
        // 1. Validasi input dari form login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Proses autentikasi dengan role = kasir
        if (Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'role' => 'kasir',
        ])) {

            // 3. Regenerasi session untuk keamanan
            $request->session()->regenerate();

            // 4. Redirect ke dashboard kasir
            return redirect()->route('kasir.dashboard');
        }

        // 5. Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    // =====================
    // LOGOUT
    // =====================
    public function logout(Request $request)
    {
        // 1. Logout user
        Auth::logout();

        // 2. Hapus session lama
        $request->session()->invalidate();

        // 3. Regenerate CSRF token
        $request->session()->regenerateToken();

        // 4. Redirect ke halaman opening / login
        return redirect()->route('opening');
    }
}
