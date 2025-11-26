<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


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

    public function submit(Request $request)
    {
        $data = $request->only([
            'tgl_terima', 'nama_wajib_pajak', 'npwp', 'nop', 'alamat', 'desa_kelurahan',
            'kecamatan', 'ppatk_ppats', 'luas_tanah', 'posisiStrategis', 'luas_bangunan',
            'tipeBangunan', 'jmlhLantai', 'kondisiBangunan', 'catatanKhusus', 'tgl_survey'
        ]);

        // generate PDF
        $pdf = Pdf::loadView('PDF.formulirSurvey', compact('data'));
        $pdfBase64 = base64_encode($pdf->output());

        // simpan sementara data form ke session agar nanti bisa di-save ke database
        session(['surveyPDF' => $pdfBase64, 'surveyData' => $data]);

        // balik ke halaman form dengan memunculkan modal preview
        return redirect()->back()->with('previewPDF', true);
    }


    // 2️⃣ Setelah user tekan tombol Download/Setujui → Simpan PDF ke database
    public function savePDF()
    {
        $pdfBase64 = session('surveyPDF');
        $data = session('surveyData');

        $fileName = 'BPHTB_'.time().'.pdf';
        Storage::put("public/pdf/$fileName", base64_decode($pdfBase64));

        SurveyPDF::create([
            'nama_wajib_pajak' => $data['nama_wajib_pajak'],
            'file_pdf' => $fileName
        ]);

        return redirect()->back()->with('success', 'PDF berhasil disimpan ke database!');
    }

    public function downloadPDF()
    {
        $pdfBase64 = session('surveyPDF');
        return response(base64_decode($pdfBase64))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="BPHTB_Formulir.pdf"');
    }

}
