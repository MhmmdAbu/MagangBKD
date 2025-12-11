<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KtuController extends Controller
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
        return view('KTU.dashboard', compact('summary', 'permohonanPerTahun', 'permohonanMasuk'));
    }

    public function daftarBerkas(Request $request) {
        $query = Pengajuan::query();
        $searchableColumns = [
            // Data dasar
            'nomor_surat_masuk',
            'statusPublic',
            'jenisLayanan',
            'nama_wajib_pajak',
            'nik',
            'kelurahan_desa_wp',
            'rt_rw_wp',
            'kecamatan_wp',
            'kabupaten_kota_wp',
            'kode_pos',
            'nomor_tlp',
            'npwp',
            'alamat_wp',
        ];

        // Filter Tanggal
        if ($request->filled('tanggal')) {
            $query->whereDate('created_at', $request->tanggal);
        }

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search, $searchableColumns) {
                foreach ($searchableColumns as $col) {
                    $q->orWhere($col, 'LIKE', "%$search%");
                }
            });
        }

        // Filter Status
        if ($request->filled('status') && $request->status != 'Status') {
            $query->where('status', $request->status);
        }

        // Pagination
        $berkas = $query->paginate(10)->appends($request->query());
        return view('Administrator.berkas', compact('berkas'));
    }

    public function arsipBerkas() {
        return view('KTU.berkas_arsip');
    }
    public function panduan() {
        return view('KTU.panduan');
    }
     public function profile() {
        return view('KTU.profile');
    }
}
