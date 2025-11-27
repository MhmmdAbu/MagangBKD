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
            'nomor_hp'=> 'required',
            'role' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            // 'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan data user
        User::create([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'instansi' => $request->instansi,
            'nomor_hp' => $request->nomor_hp,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);
        return redirect()->route('kelola_pengguna')->with('success', 'Registrasi berhasil, silakan login.');
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
                case 'Administrator':
                    return redirect()->route('administrator.dashboard');
                case 'Admin':
                    return redirect()->route('admin.dashboard');
                case 'PPAT':
                    return redirect()->route('pengajuan');
                case 'KTU':
                    return redirect()->route('ktu.dashboard');
                case 'kepala_uptd':
                    return redirect()->route('kepala_uptd.dashboard');
                case 'koordinator_survey':
                    return redirect()->route('kordinator.dashboard');
                case 'anggota_survey':
                    return redirect()->route('/anggota-survey');
                case 'kepala_badan':
                    return redirect()->route('/kepala-badan');
                default:
                    return redirect()->route('LandingPage');
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
