<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pengajuan;

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

            'file_keterangan_waris'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_pernyataan_waris'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_kuasa_waris'        => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_ktp_kk'             => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_kematian'           => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_kia'                => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_sertifikat'         => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_pbb'                => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_pernyataan_materai' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
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

        // Gabungkan semua input + file
        $data = array_merge($request->all(), $berkas);

        // 👇 SIMPAN KE DATABASE
        $pengajuan = Pengajuan::create([
            'id_ppat'                => auth()->id(),
            'nama_wajib_pajak'       => $data['nama_wajib_pajak'],
            'nik'                    => $data['nik'],
            'npwp'                   => $data['npwp'],
            'kelurahan_desa_wp'      => $data['kelurahan_desa_wp'],
            'rt_rw_wp'               => $data['rt_rw_wp'],
            'kecamatan_wp'           => $data['kecamatan_wp'],
            'kabupaten_kota_wp'      => $data['kabupaten_kota_wp'],
            'kode_pos'               => $data['kode_pos'],
            'nomor_tlp'              => $data['nomor_tlp'],
            'alamat_wp'              => $data['alamat_wp'],
            

            // file
            'file_keterangan_waris'  => $berkas['file_keterangan_waris'] ?? null,
            'file_pernyataan_waris'  => $berkas['file_pernyataan_waris'] ?? null,
            'file_kuasa_waris'       => $berkas['file_kuasa_waris'] ?? null,
            'file_ktp_kk'            => $berkas['file_ktp_kk'] ?? null,
            'file_kematian'          => $berkas['file_kematian'] ?? null,
            'file_kia'               => $berkas['file_kia'] ?? null,
            'file_sertifikat'        => $berkas['file_sertifikat'] ?? null,
            'file_pbb'               => $berkas['file_pbb'] ?? null,
            'file_pernyataan_materai'=> $berkas['file_pernyataan_materai'] ?? null,
        ]);

        $pdf = PDF::loadView('pdf.sspd_bphtb', ['data' => $pengajuan]);

        $pdfName = 'Pengajuan-BPHTB-' . $pengajuan->nama_wajib_pajak. time() . '.pdf';
        $pdfPath = storage_path('app/public/pdf_pengajuan/' . $pdfName);

        // Pastikan foldernya ada
        if (!file_exists(storage_path('app/public/pdf_pengajuan'))) {
            mkdir(storage_path('app/public/pdf_pengajuan'), 0777, true);
        }

        // Simpan pdf ke storage
        $pdf->save($pdfPath);

        // Update database dengan nama file PDF
        $pengajuan->update([
            'file_blanko' => $pdfName
        ]);
        // Kirim ke modal preview
        return back()->with([
            'show_modal' => true,
            'data' => $data
        ]);
    }

    public function downloadPDF(Request $request)
    {
        $data = json_decode($request->data, true);
        $namaWajibPajak = $data['nama_wajib_pajak'];
        $namaFile = 'Pengajuan-BPHTB-'. $namaWajibPajak . time() . '.pdf';
        $filePath = storage_path('app/public/' . $namaFile);
        $pdf = PDF::loadView('pdf.sspd_bphtb', compact('data'));
        $pdf->save($filePath);
    
        return response()->download($filePath, $namaFile)->deleteFileAfterSend(false);
    }
}
