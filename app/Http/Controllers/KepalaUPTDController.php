<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KepalaUPTDController extends Controller
{
    public function index() {
        $summary = [
            'semua_berkas' => 30,
            'menunggu_disposisi' => 21,
            'proses_disposisi' => 9,
        ];

        // Data permohonan pertahun (tahun => jumlah)
        $permohonanPerTahun = [
            2019 => 8,
            2020 => 10,
            2021 => 15,
            2022 => 18,
            2023 => 30,
        ];
        
        // Data permohonan masuk untuk pie chart
        $permohonanMasuk = [
            'Selesai' => 10,
            'Proses' => 20,
            'Menunggu' => 15,
        ];
        return view('kepala_uptd.dashboard', compact('summary', 'permohonanPerTahun', 'permohonanMasuk'));
    }

    public function daftarBerkas() {
        return view('kepala_uptd.berkas');
    }

    public function arsipBerkas() {
        return view('kepala_uptd.arsip');
    }
    public function panduan() {
        return view('kepala_uptd.panduan');
    }
     public function profile() {
        return view('kepala_uptd.profile');
    }
}
