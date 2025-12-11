<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Pengajuan;

class PPATController extends Controller
{
    public function showPengajuan(Request $request)
    {
        $query = Pengajuan::where('id_ppat', Auth::id());
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
        $riwayat = $query->paginate(10)->appends($request->query());

        return view('PPAT.pengajuan', compact('riwayat'));
    }



    public function membuatPengajuan(Request $request)
    {
        
        $request->validate([
            'nomor_surat_masuk' => 'required|string',
            'jenisLayanan'      => 'required|string',

            // Data Wajib Pajak
            'nama_wajib_pajak'  => 'required|string',
            'nik'               => 'required|string',
            'kelurahan_desa_wp' => 'nullable|string',
            'rt_rw_wp'          => 'nullable|string',
            'kecamatan_wp'      => 'nullable|string',
            'kabupaten_kota_wp' => 'nullable|string',
            'kode_pos'          => 'nullable|string',
            'nomor_tlp'         => 'nullable|string',
            'npwp'              => 'nullable|string',
            'alamat_wp'         => 'nullable|string',

            'file_ktp_pihak_pertama'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_ktp_pihak_kedua'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_kk_pihak_pertama'    => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_kk_pihak_kedua'      => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',

            'file_pernyataan_materai'  => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_sertifikat'          => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_pbb'                 => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_kwitansi'            => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_keterangan_waris'    => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_pernyataan_waris'    => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_kuasa_waris'         => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_kematian'            => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_kia'                 => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $data = $request->all();
        $pdf = PDF::loadView('PDF.sspd_bphtb', ['data' => $data]);

        $pdfName = 'Pengajuan-BPHTB-' . $data['nama_wajib_pajak'] . time() . '.pdf';

        // Path relatif ke storage/app/public
        $pdfPath = 'pdf_pengajuan/' . $pdfName;
        Storage::disk('public')->makeDirectory('pdf_pengajuan');
        Storage::disk('public')->put($pdfPath, $pdf->output());

        // SIMPAN DATA
        $pengajuan = new Pengajuan();
        $pengajuan->nomor_surat_masuk = $request->nomor_surat_masuk;
        $pengajuan->status            = "Menunggu Verifikasi";
        $pengajuan->statusPublic      = "Verifikasi";
        $pengajuan->jenisLayanan      = $request->jenisLayanan;
        $pengajuan->id_ppat = Auth::id(); // id user login

        // DATA WAJIB PAJAK
        $pengajuan->nama_wajib_pajak  = $request->nama_wajib_pajak;
        $pengajuan->nik               = $request->nik;
        $pengajuan->kelurahan_desa_wp = $request->kelurahan_desa_wp;
        $pengajuan->rt_rw_wp          = $request->rt_rw_wp;
        $pengajuan->kecamatan_wp      = $request->kecamatan_wp;
        $pengajuan->kabupaten_kota_wp = $request->kabupaten_kota_wp;
        $pengajuan->kode_pos          = $request->kode_pos;
        $pengajuan->nomor_tlp         = $request->nomor_tlp;
        $pengajuan->npwp              = $request->npwp;
        $pengajuan->alamat_wp         = $request->alamat_wp;
        $pengajuan->file_blanko       = $pdfName;

        // ===== UPLOAD FILE GENERAL HANDLER =====
        $mapping = [
            // Jual Beli
            'file_ktp_penjual'           => 'file_ktp_pihak_pertama',
            'file_ktp_pembeli'           => 'file_ktp_pihak_kedua',
            'file_kk_penjual'            => 'file_kk_pihak_pertama',
            'file_kk_pembeli'            => 'file_kk_pihak_kedua',
            'file_pernyataan_jual_beli'  => 'file_pernyataan_materai',
            'file_sertifikat_jual_beli'  => 'file_sertifikat',
            'file_pbb_jual_beli'         => 'file_pbb',
            'file_kwitansi_jual_beli'    => 'file_kwitansi',

            // Hibah
            'file_ktp_penjual_hibah'     => 'file_ktp_pihak_pertama',
            'file_ktp_pembeli_hibah'     => 'file_ktp_pihak_kedua',
            'file_kk_penjual_hibah'      => 'file_kk_pihak_pertama',
            'file_kk_pembeli_hibah'      => 'file_kk_pihak_kedua',
            'file_sertifikat_hibah'      => 'file_sertifikat',
            'file_pbb_hibah'             => 'file_pbb',
            'file_pernyataan_hibah'      => 'file_pernyataan_materai',

            // PTSL
            'file_ktp_penjual_ptsl'      => 'file_ktp_pihak_pertama',
            'file_ktp_pembeli_ptsl'      => 'file_ktp_pihak_kedua',
            'file_kk_penjual_ptsl'       => 'file_kk_pihak_pertama',
            'file_kk_pembeli_ptsl'       => 'file_kk_pihak_kedua',
            'file_sertifikat_ptsl'       => 'file_sertifikat',
            'file_pbb_ptsl'              => 'file_pbb',
            'file_pernyataan_ptsl'       => 'file_pernyataan_materai',

            // Waris
            'file_ktp_kk'                => 'file_ktp_pihak_pertama',
            'file_pernyataan_waris'      => 'file_pernyataan_waris',
            'file_keterangan_waris'      => 'file_keterangan_waris',
            'file_kuasa_waris'           => 'file_kuasa_waris',
            'file_kematian'              => 'file_kematian',
            'file_kia'                   => 'file_kia',
        ];

        foreach ($mapping as $input => $dbField) {
            if ($request->hasFile($input)) {
                $path = $request->file($input)->store('uploads/pengajuan', 'public');
                $pengajuan->$dbField = $path;
            }
        }

        $pengajuan->save();


        session([
            'show_modal' => true,
            'namaPDF'    => $pdfName,
        ]);

        return redirect()->route('pengajuan');
    }

    public function berkasPDF($namaPDF, $namaBerkas)
    {
        // Mapping jenis file ke label manusiawi
        $fileLabels = [
            'file_ktp_pihak_pertama' => 'KTP PIHAK PERTAMA',
            'file_ktp_pihak_kedua' => 'KTP PIHAK KEDUA',
            'file_kk_pihak_pertama' => 'KK PIHAK PERTAMA',
            'file_kk_pihak_kedua' => 'KK PIHAK KEDUA',
            'file_pernyataan_materai' => 'PERNYATAAN MATERAI',
            'file_sertifikat' => 'SERTIFIKAT',
            'file_pbb' => 'PBB',
            'file_kwitansi' => 'KWITANSI',
            'file_keterangan_waris' => 'KETERANGAN WARIS',
            'file_pernyataan_waris' => 'PERNYATAAN WARIS',
            'file_kuasa_waris' => 'KUASA WARIS',
            'file_kematian' => 'AKTA KEMATIAN',
            'file_kia' => 'KIA',
        ];

        // Ambil label manusiawi atau gunakan nama asli jika tidak ada mapping
        $labelBerkas = $fileLabels[$namaBerkas] ?? $namaBerkas;

        return view('PPAT.berkas', [
            'filePDF' => $namaPDF,
            'namaBerkas' => $labelBerkas, 
        ]);
    }


    public function previewPDF($namaPDF)
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
        ];

        $kelengkapan = [];

        foreach ($fileColumns as $col) {
            if (!empty($pengajuan->$col)) {

                $kelengkapan[] = [
                    'nama_kolom' => $col,
                    'nama_file'  => $pengajuan->$col,
                ];
            }
        }

        return view('PPAT.preview_kelengkapan', [
            'pdfUtama' => $namaPDF,
            'kelengkapan' => $kelengkapan,
        ]);
    }

    public function downloadPDF($namaPDF)
    {
        $path = Storage::disk('public')->path("pdf_pengajuan/$namaPDF");
        return response()->download($path);
    }

    public function closeModal()
    {
        // hapus session modal
        session()->forget(['show_modal', 'namaPDF']);

        // redirect ulang halaman pengajuan tanpa modal
        return redirect()->route('pengajuan');
    }

    public function hapusBlanko(Request $request)
    {
        $namaPDF = session('namaPDF');

        if (!$namaPDF) {
            return back()->with('error', 'Tidak ada file blanko yang ditemukan untuk dihapus.');
        }
        $filePath = "pdf_pengajuan/$namaPDF";
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }

        // HAPUS DATA dari database
        $pengajuan = Pengajuan::where('file_blanko', $namaPDF)->where('id_ppat', Auth::id())->first();
        if ($pengajuan) {
            $pengajuan->delete();
        }
         // Clear session setelah dihapus
        session()->forget(['namaPDF', 'show_modal']);
        return redirect()->route('pengajuan')->with('success', 'Pengajuan berhasil dibatalkan dan dihapus.');
    }

}