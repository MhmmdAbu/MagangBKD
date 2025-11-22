<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kordinatorController extends Controller
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
        return view('KordinatorSurv.dashboard', compact('summary', 'permohonanPerTahun', 'permohonanMasuk'));
    }

    public function daftarBerkas() {
        return view('KordinatorSurv.berkas');
    }

    public function surveyBerkas() {
        return view('KordinatorSurv.survey');
    }
    public function panduan() {
        return view('KordinatorSurv.panduan');
    }
     public function profile() {
        return view('KordinatorSurv.profile');
    }
}
