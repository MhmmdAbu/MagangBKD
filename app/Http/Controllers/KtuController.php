<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Pengajuan;

class KtuController extends Controller
{
    public function index()
    {
        // Total semua berkas
        $totalSemua = Pengajuan::count();

        // Berkas Selesai
        $totalSelesai = Pengajuan::where('status', 'Ditolak', 'Selesai')->count();

        // Berkas Menunggu (selain Selesai & Cermati)
        $totalMenunggu = Pengajuan::whereNotIn('status', ['Selesai', 'Ditolak' ,'Cermati'])->count();

        // Permohonan Per Tahun
        $permohonanPerTahun = Pengajuan::selectRaw('YEAR(created_at) as tahun, COUNT(*) as total')
            ->groupByRaw('YEAR(created_at)')
            ->orderBy('tahun', 'asc')
            ->get();

        return view('KTU.Dashboard', compact(
            'totalSemua',
            'totalMenunggu',
            'totalSelesai',
            'permohonanPerTahun'
        ));
    }

    public function daftarBerkas(Request $request) 
    {
        $query = Pengajuan::query();
        $query->whereNotIn('status', ['Cermati', 'Ditolak','Selesai']);

        $searchableColumns = [
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

        // Filter Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search, $searchableColumns) {
                foreach ($searchableColumns as $col) {
                    $q->orWhere($col, 'LIKE', "%$search%");
                }
            });
        }

        // Filter Status (selain Cermati & Selesai)
        if ($request->filled('status') && $request->status != 'Status') {
            $query->where('status', $request->status);
        }

        // Pagination
        $berkas = $query->paginate(10)->appends($request->query());

        return view('KTU.berkas_terdaftar', compact('berkas'));
    }

    public function previewBerkas($namaPDF)
    {
        $pengajuan = Pengajuan::where('file_blanko', $namaPDF)->firstOrFail();
        $fileColumns = [
            'file_ktp_pihak_pertama',
            'file_ktp_pihak_kedua',
            'file_kk_pihak_pertama',
            'file_kk_pihak_kedua',
            'file_pernyataan_materai',
            'file_sertifikat',
            'file_pbb',
            'file_kwitansi',
            'file_keterangan_waris',
            'file_pernyataan_waris',
            'file_kuasa_waris',
            'file_kematian',
            'file_kia',
            'file_disposisi',
        ];

        $id                = $pengajuan->id;
        $status            = $pengajuan->status;
        $statusPublic      = $pengajuan->statusPublic;
        $catatan           = $pengajuan->catatan;
        $kelengkapan = [];

        foreach ($fileColumns as $col) {
            if (!empty($pengajuan->$col)) {

                $kelengkapan[] = [
                    'nama_kolom' => $col,
                    'nama_file'  => $pengajuan->$col,
                ];
            }
        }

        return view('KTU.component.review', [
            'catatan'      => $catatan,
            'pdfUtama'     => $namaPDF,
            'kelengkapan'  => $kelengkapan,
            'status'       => $status,
            'statusPublic' => $statusPublic,
            'id'           => $id,
        ]);
    }

    public function previewBerkasKelengkapan($namaPDF)
    {
        return view('KTU.component.berkas_kelengkapan', [
            'filePDF' => $namaPDF,
        ]);
    }

    public function setValid($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'Menunggu Surveyor';
        $pengajuan->statusPublic = 'Survey';
        $pengajuan->save();

        return back()->with('success', 'Berkas telah divalidasi.');
    }
    

    public function arsipBerkas(Request $request)
    {
        // Ambil hanya berkas yang statusnya SELESAI
        $query = Pengajuan::where('status', 'Ditolak','Selesai');

        $searchableColumns = [
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

        // Filter tanggal
        if ($request->filled('tanggal')) {
            $query->whereDate('created_at', $request->tanggal);
        }

        // Filter pencarian
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search, $searchableColumns) {
                foreach ($searchableColumns as $col) {
                    $q->orWhere($col, 'LIKE', "%$search%");
                }
            });
        }

        // Pagination
        $berkas = $query->paginate(10)->appends($request->query());
        return view('KTU.berkas_arsip', compact('berkas'));
    }
    public function panduan() {
        return view('KTU.panduan');
    }
     public function profile() {
        return view('KTU.profile');
    }
}
