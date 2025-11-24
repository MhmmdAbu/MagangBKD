<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class PPATController extends Controller
{
    public function showPengajuan() {
        return view('PPAT.pengajuan');
    }

    public function pengajuan(Request $request)
    {
        try {
            // Validasi input (hanya field wajib; file opsional sesuai form)
            $request->validate([
                'nama_wajib_pajak' => 'required',
                'nik' => 'required',
                'file_keterangan_waris' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                'file_pernyataan_waris' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                'file_kuasa_waris' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
                'file_ktp_kk' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                'file_kematian' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
                'file_kia' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
                'file_sertifikat' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                'file_pbb' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                'file_pernyataan_materai' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            ]);

            // Upload file dan simpan path (jangan simpan objek UploadedFile)
            $uploadedFiles = [];
            $fileFields = [
                'file_keterangan_waris', 'file_pernyataan_waris', 'file_kuasa_waris',
                'file_ktp_kk', 'file_kematian', 'file_kia', 'file_sertifikat',
                'file_pbb', 'file_pernyataan_materai'
            ];
            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    $path = $request->file($field)->store('berkas_pengajuan', 'public');
                    $uploadedFiles[$field . '_path'] = $path;  // Simpan path
                }
            }

            // Ambil data input non-file
            $inputData = $request->except(array_merge(['_token'], $fileFields));

            // Gabungkan data
            $data = array_merge($inputData, $uploadedFiles);

            // Simpan ke session
            session(['pengajuan_data' => $data]);

            // Redirect back dengan session untuk modal dan pesan sukses
            return back()->with([
                'show_modal' => true,
                'success' => 'Pengajuan berhasil! Silakan preview PDF.'
            ]);

        } catch (\Exception $e) {
            Log::error('Error in pengajuan: ' . $e->getMessage());
            return back()->withErrors('Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    // Method untuk preview PDF (GET, dari session)
    public function previewPDF()
    {
        $data = session('pengajuan_data');
        if (!$data) {
            return back()->withErrors('Data PDF tidak ditemukan. Harap isi formulir terlebih dahulu.');
        }

        $pdf = Pdf::loadView('pdf.sspd_bphtb', compact('data'));
        return $pdf->stream('SSPD-BPHTB.pdf');  // Stream untuk preview
    }

    // Method untuk download PDF (POST, dari request)
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