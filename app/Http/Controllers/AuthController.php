<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    // Menampilkan halaman registrasi
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'role' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // tambahkan validasi foto
        ]);

        // Simpan foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('profile_photos', 'public');
        }

        // Simpan data user
        User::create([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'instansi' => $request->instansi,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto' => $fotoPath, // simpan path foto
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // keamanan session
            $user = Auth::user();

            switch ($user->role) {
                case 'administrator':
                    return redirect()->route('/');
                case 'admin':
                    return redirect()->route('/');
                case 'ppat':
                    return redirect()->route('/');
                case 'ktu':
                    return redirect()->route('/');
                case 'kepala_uptd':
                    return redirect()->route('/');
                case 'koordinator_survey':
                    return redirect()->route('/');
                case 'anggota_survey':
                    return redirect()->route('/');
                case 'kepala_badan':
                    return redirect()->route('/');
                default:
                    return redirect()->route('/');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
