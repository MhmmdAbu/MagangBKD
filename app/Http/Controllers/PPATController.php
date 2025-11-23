<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PPATController extends Controller
{
    public function store(Request $request)
    {
        try {

            // VALIDASI DASAR
            $request->validate([
                'nama_wajib_pajak' => 'required',
                'nik' => 'required',
                'file_keterangan_waris' => 'required|file',
                'file_pernyataan_waris' => 'required|file',
                'file_ktp_kk' => 'required|file',
                'file_sertifikat' => 'required|file',
                'file_pbb' => 'required|file',
                'file_pernyataan_materai' => 'required|file',
            ]);

            // UPLOAD FILES
            $uploadFolder = 'berkas_pengajuan';

            $files = [
                'file_keterangan_waris',
                'file_pernyataan_waris',
                'file_kuasa_waris',
                'file_ktp_kk',
                'file_kematian',
                'file_kia',
                'file_sertifikat',
                'file_pbb',
                'file_pernyataan_materai'
            ];

            $data = $request->all();

            foreach ($files as $file) {
                if ($request->hasFile($file)) {
                    $data[$file] = $request->file($file)->store($uploadFolder, 'public');
                }
            }

            // SIMPAN KE DATABASE
            $pengajuan = Pengajuan::create($data);

            /* ============================
            |  GENERATE PDF OTOMATIS
            ============================= */

            $pdfData = [
                'judul' => 'Bukti Pengajuan Permohonan',
                'tanggal' => now()->format('d-m-Y'),
                'pengajuan' => $pengajuan
            ];

            // Buat PDF dari file blade
            $pdf = Pdf::loadView('PDF.sspd_bptb', $pdfData);

            // Nama file PDF
            $pdfName = 'pengajuan_' . $pengajuan->id . '.pdf';

            // Simpan ke storage/public/pdf_pengajuan/
            Storage::disk('public')->put('pdf_pengajuan/' . $pdfName, $pdf->output());

            // Simpan path PDF ke database
            $pengajuan->update([
                'file_pdf' => 'pdf_pengajuan/' . $pdfName
            ]);

            return redirect()->back()->with('success', 'Permohonan berhasil diajukan & PDF berhasil dibuat!');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function showPengajuan() {
        return view('PPAT.pengajuan');
    }

}
