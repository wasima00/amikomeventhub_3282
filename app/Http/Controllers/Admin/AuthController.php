<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. Menampilkan halaman formulir Login
    public function showLogin()
    {
        return view('auth.login');
    }

    // 2. Memproses validasi Submit Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek role, arahkan sesuai hak akses
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // User biasa diarahkan ke halaman utama
            return redirect()->route('home');
        }

        return back()->with('error', 'Email atau password salah.')->withInput();
    }

    // 3. Menampilkan halaman formulir Register
    public function showRegister()
    {
        return view('auth.register');
    }

    // 4. Memproses validasi Submit Register
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registrasi berhasil! Selamat datang.');
    }

    // 5. Memproses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}