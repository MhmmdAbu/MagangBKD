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

        // Filter Tanggal
        if ($request->filled('tanggal')) {
            $query->whereDate('created_at', $request->tanggal);
        }

        // Filter Pencarian (nomor surat)
        if ($request->filled('search')) {
            $query->where('nomor_surat_masuk', 'like', '%'.$request->search.'%');
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

            // Semua file hanya boleh PDF, JPG, JPEG, PNG max 5MB
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
        $fileFields = [
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
            'file_kia'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('uploads/pengajuan', 'public');
                $pengajuan->$field = $path;
            }
        }
        $pengajuan->save();


        session([
            'show_modal' => true,
            'namaPDF'    => $pdfName,
        ]);

        return redirect()->route('pengajuan');
    }

    public function previewPDF($namaPDF)
    {
        $path = Storage::disk('public')->path("pdf_pengajuan/$namaPDF");
        return response()->file($path);
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