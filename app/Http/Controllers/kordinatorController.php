<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\Pengajuan;
use App\Models\Survey;
use App\Models\User;
=======
use Barryvdh\DomPDF\Facade\Pdf;

>>>>>>> 80dcb705f74c2c5381ddebc1db3dbd1b11e14d0c

class kordinatorController extends Controller
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

        return view('KordinatorSurv.dashboard', compact(
            'totalSemua',
            'totalMenunggu',
            'totalSelesai',
            'permohonanPerTahun'
        ));
    }

    public function daftarBerkas(Request $request)
    {
        $query = Pengajuan::query()
            ->leftJoin('survey', 'survey.pengajuanId', '=', 'pengajuan.id')
            ->leftJoin('users', 'users.id', '=', 'survey.surveyorId')
            ->whereNotIn('pengajuan.status', ['Selesai', 'Ditolak', 'Cermati'])
            ->select(
                'pengajuan.*',
                'users.name as nama_surveyor'
            );

        $searchableColumns = [
            'pengajuan.nomor_surat_masuk',
            'pengajuan.statusPublic',
            'pengajuan.jenisLayanan',
            'pengajuan.nama_wajib_pajak',
            'pengajuan.nik',
            'pengajuan.kelurahan_desa_wp',
            'pengajuan.rt_rw_wp',
            'pengajuan.kecamatan_wp',
            'pengajuan.kabupaten_kota_wp',
            'pengajuan.kode_pos',
            'pengajuan.nomor_tlp',
            'pengajuan.npwp',
            'pengajuan.alamat_wp',
            'users.name', // 🔥 search nama surveyor
        ];

        // Filter tanggal
        if ($request->filled('tanggal')) {
            $query->whereDate('pengajuan.created_at', $request->tanggal);
        }

        // Filter search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search, $searchableColumns) {
                foreach ($searchableColumns as $col) {
                    $q->orWhere($col, 'LIKE', "%{$search}%");
                }
            });
        }

        // Filter status (opsional dari dropdown)
        if ($request->filled('status') && $request->status !== 'Status') {
            $query->where('pengajuan.status', $request->status);
        }

        $berkas = $query
            ->orderBy('pengajuan.created_at', 'desc')
            ->paginate(10)
            ->appends($request->query());

        return view('KordinatorSurv.berkas', compact('berkas'));
    }

    public function previewBerkasKelengkapan($namaPDF)
    {
        return view('KordinatorSurv.berkas_kelengkapan', [
            'filePDF' => $namaPDF,
        ]);
    }

    public function previewBerkas($namaPDF)
    {
        $pengajuan = Pengajuan::where('file_blanko', $namaPDF)->firstOrFail();

        $query = Pengajuan::query()
            ->leftJoin('survey', 'survey.pengajuanId', '=', 'pengajuan.id')
            ->leftJoin('users', 'users.id', '=', 'survey.surveyorId')
            ->where('file_blanko', $namaPDF)
            ->select(
                'pengajuan.*',
                'users.name as name_surveyor',
                'users.id as userID'
            )->first();

        $surveyors = User::whereIn('role', ['anggota_survey','koordinator_survey'])->get();
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
        $nomorWajibPajak   = $pengajuan->nomor_tlp;
        $status            = $pengajuan->status;
        $statusPublic      = $pengajuan->statusPublic;
        $catatan           = $pengajuan->catatan;
        $namaSurveyor      = $query->name_surveyor;
        $IdSurveyor        = $query->userID;
        $kelengkapan       = [];

        foreach ($fileColumns as $col) {
            if (!empty($pengajuan->$col)) {

                $kelengkapan[] = [
                    'nama_kolom' => $col,
                    'nama_file'  => $pengajuan->$col,
                ];
            }
        }

        return view('KordinatorSurv.review', [
            'catatan'      => $catatan,
            'pdfUtama'     => $namaPDF,
            'kelengkapan'  => $kelengkapan,
            'status'       => $status,
            'statusPublic' => $statusPublic,
            'id'           => $id,
            'surveyors'    => $surveyors,
            'nomorWP'      => $nomorWajibPajak,
            'namaSurveyor' => $namaSurveyor,
            'IdSurveyor'   => $IdSurveyor,
        ]);
    }

    public function surveyBerkas(Request $request) {
        $query = Pengajuan::query()
            ->leftJoin('survey', 'survey.pengajuanId', '=', 'pengajuan.id')
            ->leftJoin('users', 'users.id', '=', 'survey.surveyorId')
            ->whereIn('pengajuan.status', ['Sedang Disurvey'])
            ->where('users.role', 'koordinator_survey') // 🔥 filter role
            ->select(
                'pengajuan.*',
                'users.name as nama_surveyor'
            );


        $searchableColumns = [
            'pengajuan.nomor_surat_masuk',
            'pengajuan.statusPublic',
            'pengajuan.jenisLayanan',
            'pengajuan.nama_wajib_pajak',
            'pengajuan.nik',
            'pengajuan.kelurahan_desa_wp',
            'pengajuan.rt_rw_wp',
            'pengajuan.kecamatan_wp',
            'pengajuan.kabupaten_kota_wp',
            'pengajuan.kode_pos',
            'pengajuan.nomor_tlp',
            'pengajuan.npwp',
            'pengajuan.alamat_wp',
            'users.name', // 🔥 search nama surveyor
        ];

        // Filter tanggal
        if ($request->filled('tanggal')) {
            $query->whereDate('pengajuan.created_at', $request->tanggal);
        }

        // Filter search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search, $searchableColumns) {
                foreach ($searchableColumns as $col) {
                    $q->orWhere($col, 'LIKE', "%{$search}%");
                }
            });
        }

        // Filter status (opsional dari dropdown)
        if ($request->filled('status') && $request->status !== 'Status') {
            $query->where('pengajuan.status', $request->status);
        }

        $berkas = $query
            ->orderBy('pengajuan.created_at', 'desc')
            ->paginate(10)
            ->appends($request->query());

        return view('KordinatorSurv.survey', compact('berkas'));
    }

    public function simpanSurveyor(Request $request, $id)
    {
        $request->validate([
            'surveyor_id' => 'required|exists:users,id',
        ]);

        // Pastikan user benar-benar surveyor
        $surveyor = User::where('id', $request->surveyor_id)
            ->whereIn('role', ['anggota_survey', 'koordinator_survey'])
            ->firstOrFail();

        $pengajuan = Pengajuan::findOrFail($id);

        Survey::updateOrCreate(
            ['pengajuanId' => $pengajuan->id],
            ['surveyorId'  => $surveyor->id]
        );

        $pengajuan->update([
            'status' => 'Sedang Disurvey',
            'statusPublic' => 'Survey',
        ]);

        return back()->with('success', 'Surveyor berhasil ditetapkan.');
    }

    public function surveyForm($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('KordinatorSurv.surveyForm', compact('pengajuan'));
    }

    public function submitForm(Request $request, $id)
    {
        $request->validate([
            'luasTanah' => 'nullable|numeric',
            'luasBangunan' => 'nullable|numeric',
            'posisiStrategisTanah' => 'nullable|string',
            'jenisBangunan' => 'nullable|string',
            'catatan' => 'nullable|string',
            'nilaiKhusus' => 'nullable|numeric',
            'fileFotoBangunan' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $survey = Survey::where('pengajuanId', $pengajuanId)->first();

        if ($request->hasFile('fileFotoBangunan')) {
            $survey->fileFotoBangunan = $request->file('fileFotoBangunan')
                ->store('survey', 'public');
        }

        $survey->fill([
            'tanggalPelaksanaan' => now(),
            'luasTanah' => $request->luasTanah,
            'posisiStrategisTanah' => $request->posisiStrategisTanah,
            'luasBangunan' => $request->luasBangunan,
            'jenisBangunan' => $request->jenisBangunan,
            'catatan' => $request->catatan,
            'nilaiKhusus' => $request->nilaiKhusus,
        ]);

        $survey->save();

        return back()->with('success', 'Data survey berhasil diperbarui');
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
