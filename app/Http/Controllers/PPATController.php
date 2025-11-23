<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PPATController extends Controller
{
    public function pengajuan(Request $request){
        $request->validate([
        'nama_wajib_pajak' => 'required',
        'nik' => 'required',
        'alamat' => 'required',
        'jenis_transaksi' => 'required',
        'lampiran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:4096',
    ]);

    // Simpan file upload
    $file = $request->file('lampiran');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $file->storeAs('public/lampiran_sspd', $fileName);

    // Simpan data ke database
    $data = SSPD::create([
        'nama_wajib_pajak' => $request->nama_wajib_pajak,
        'nik' => $request->nik,
        'alamat' => $request->alamat,
        'jenis_transaksi' => $request->jenis_transaksi,
        'lampiran' => $fileName,
    ]);

    // Generate PDF
    $pdf = PDF::loadView('pdf.sspd_bphtb', compact('data'));
    return $pdf->download('SSPD-BPHTB-'.$data->nama_wajib_pajak.'.pdf');
    }

}
