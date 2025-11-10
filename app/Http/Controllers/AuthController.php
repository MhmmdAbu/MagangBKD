<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class AuthController extends Controller
{
    // // Menampilkan halaman registrasi
    // public function showRegister()
    // {
    //     return view('auth.register');
    // }

    // // Proses registrasi
    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'alamat' => 'required|string|max:255',
    //         'instansi' => 'required|string|max:255',
    //         'role' => 'required|string|max:50',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:8|confirmed',
    //     ]);

    //     // Simpan data user
    //     User::create([
    //         'name' => $request->name,
    //         'alamat' => $request->alamat,
    //         'instansi' => $request->instansi,
    //         'role' => $request->role,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     return redirect()->route('berkas_terdaftar')->with('success', 'Registrasi berhasil, silakan login.');
    // }

    // Menampilkan halaman register
    public function showRegister()
    {
        return view('auth.contoh');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'role' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Simpan user
        User::create([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'instansi' => $request->instansi,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
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
