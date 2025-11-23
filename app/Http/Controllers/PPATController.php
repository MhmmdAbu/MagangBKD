<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PPATController extends Controller
{
    public function showPengajuan() {
        return view('PPAT.pengajuan');
    }

    public function pengajuan(Request $request)
    {
        $request->validate([
            'nama_wajib_pajak' => 'required',
            'nik' => 'required',
        ]);

        // Simpan file upload
        $berkas = [];
        foreach ([
            'file_keterangan_waris','file_pernyataan_waris','file_kuasa_waris',
            'file_ktp_kk','file_kematian','file_kia','file_sertifikat',
            'file_pbb','file_pernyataan_materai'
        ] as $fileName) 
        {
            if ($request->hasFile($fileName)) {
                $file = $request->file($fileName);
                $newName = time().'_'.$file->getClientOriginalName();
                $file->storeAs('public/berkas_pengajuan', $newName);
                $berkas[$fileName] = $newName;
            }
        }

        $data = array_merge($request->all(), $berkas);

        // Kirim ke halaman agar modal tampil
        return back()->with([
            'show_modal' => true,
            'data' => $data
        ]);
    }
    public function downloadPDF(Request $request)
    {
        $data = json_decode($request->data, true);
        $pdf = PDF::loadView('pdf.sspd_bphtb', compact('data'));
        return $pdf->download('Pengajuan-BPHTB.pdf');
    }
}
