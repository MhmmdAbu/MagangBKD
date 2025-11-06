<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KtuController extends Controller
{
    public function index() {
        return view('KTU.dashboard');
    }
    public function daftarBerkas() {
        return view('KTU.berkas_terdaftar');
    }
}
