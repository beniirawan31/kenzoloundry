<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    public function login()
    {
        return view('Pelanggan.auth.login');
    }

    public function loginProses(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('pelanggan')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->route('pelanggan.dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('Pelanggan.auth.register');
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggans,email',
            'no_hp' => 'nullable|string|max:15',
            'password' => 'required|min:3|confirmed',
        ]);

        Pelanggan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('pelanggan.login')->with('success', 'Pendaftaran berhasil, silakan login!');
    }

    public function dashboard()
    {
        return view('Pelanggan.dashboard.index');
    }

    public function logout()
    {
        Auth::guard('pelanggan')->logout();
        return redirect()->route('pelanggan.login')->with('success', 'Anda telah logout.');
    }
}
