<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function kelola_panduan(){
        return view('Admin.kelola_panduan&syarat');
    }
    
    public function kelola_pengguna() {
        $users = User::all();
        return view('Admin.kelola_pengguna', compact('users'));
    }

    public function daftarBerkas() {
        return view('Admin.berkas');
    }

    public function index() {
        return view('Admin.dashboard');
    }

    public function profile() {
        return view('Admin.profile');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string',
            'nomor_hp' => 'required|string|max:20',
        ]);

        $user = User::find($id);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Pengguna tidak ditemukan.']);
        }

        $user->update([
            'name' => $request->name,
            'role' => $request->role,
            'nomor_hp' => $request->nomor_hp,
        ]);

        return response()->json(['success' => true, 'message' => 'Data pengguna berhasil diperbarui.']);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Pengguna tidak ditemukan.'
            ]);
        }

        try {
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'Pengguna berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data.',
                'error'   => $e->getMessage()
            ]);
        }
    }

}
