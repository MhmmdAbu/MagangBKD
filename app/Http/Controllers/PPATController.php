<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Pengajuan;

class PPATController extends Controller
{
    public function showPengajuan() {
        $pengajuan = Pengajuan::where('id_ppat', Auth::id())->get();
        return view('PPAT.pengajuan', compact('pengajuan'));
    }

    public function pengajuan(Request $request)
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

        $pdf = PDF::loadView('PDF.sspd_bphtb', ['data' => $pengajuan]);

        $pdfName = 'Pengajuan-BPHTB-' . $pengajuan->nama_wajib_pajak. time() . '.pdf';
        $pdfPath = storage_path('app/public/pdf_pengajuan/' . $pdfName);

        if (!file_exists(storage_path('app/public/pdf_pengajuan'))) {
            mkdir(storage_path('app/public/pdf_pengajuan'), 0777, true);
        }

        $pdf->save($pdfPath);
        $pengajuan->update([
            'file_blanko' => $pdfName
        ]);

        return back()->with([
            'show_modal' => true,
            'data' => $pengajuan
        ]);
    }

    public function downloadPDF(Request $request)
    {
        $data = json_decode($request->data, true);
        if (!$data) {
            return back()->withErrors('Data tidak valid.');
        }

        $pdf = Pdf::loadView('pdf.sspd_bphtb', compact('data'));
        return $pdf->download('Pengajuan-BPHTB.pdf');
    }
}