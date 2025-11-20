<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    // Dashboard
    public function index() {
        return view('Administrator.Dashboard');
    }

    // Daftar Berkas
    public function daftarBerkas() {
        return view('Administrator.berkas');
    }

    // Arsip Berkas
    public function arsipBerkas() {
        return view('Administrator.arsip');
    }

    // Requirement
    Public function requirement() {
        return view('Administrator.panduan');
    }
}
