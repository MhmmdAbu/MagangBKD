<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    // Dashboard
    public function index() {
        return view('administrator.dashboard');
    }

    // Daftar Berkas
    public function daftarBerkas() {
        return view('administrator.berkas');
    }

    // Arsip Berkas
    public function arsipBerkas() {
        return view('administrator.arsip');
    }

    // Requirement
    Public function requirement() {
        return view('administrator.panduan');
    }
}
