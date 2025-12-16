@extends("layout.KAuptd")

@section('title','Panduan')

@section('content')
    <div class="container">
        <div class="left-panel">
            <div class="persyaratan-box">
                <h3>Persyaratan</h3>
                
                <div class="dropdown-container">
                    <select class="dropdown" id="layanan-select" aria-label="Pilih Layanan">
                        <option selected disabled value="">Pilih Layanan...</option>
                        <option value="layanan1">Jual Beli</option>
                        <option value="layanan2">Hibah</option>
                        <option value="layanan3">Ahli Waris</option>
                        <option value="layanan4">PTSL/PRONA</option>
                    </select>
                </div>
                
                <div class="service-list-box" id="syarat-output">
                    Pilih layanan di atas untuk melihat daftar dokumen persyaratan.
                </div>
            </div>
        </div>

        <div class="right-panel">
            <h2>Proses Pengajuan Permohonan dan Penyelesaian BPHTB</h2>

            <div class="langkah-item">
                <h3>1. PPAT/PPATS Input Data & Upload Berkas</h3>
                <p>- PPAT/PPATS mengisi formulir berupa data diri pemohon (wajib pajak), objek pajak, nilai permohonan BPHTB dan mengunggah semua dokumen dimaksud pada website UPTD PBB BPHTB.</p>
                <p>- Seluruh dokumen yang diunggah oleh PPAT/PPATS akan diproses jika telah memenuhi persyaratan.</p>
                <p>- Dokumen upload yang tidak memenuhi persyaratan akan disampaikan melalui catatan/keterangan untuk dilakukan upload ulang dokumen.</p>
            </div>
            <div class="langkah-item">
                <h3>2. UPTD PBB & BPHTB Proses Permohonan dan Penyelesaian</h3>
                <p>UPTD memverifikasi apakah semua data dan berkas yang di unggah sudah lengkap dan memenuhi persyaratan penyelesaian BPHTB</p>
                <p>a. Proses Validasi BPHTB Terklarifikasi</p>
                <p>- Proses pengadministrasian(penomoran dokumen).</p>
                <p>- Proses Survey.</p>
                <p>- Verifikasi Nilai Permohonan BPHTB.</p>
                <p>- Proses Validasi (paraf KTU UPTD, Kepala UPTD).</p>
                <p>- Proses validasi (sekretaris BKD, Kepala BKD).</p>
                <p>- Pencetakan NTPD (Nomor Transaksi Penerimaan Daerah).</p>
                <p>b. Proses Validasi BPHTB Tidak Terklarifikasi</p>
                <p>- Proses pengadministrasian(penomoran dokumen).</p>
                <p>- Proses Survey.</p>
                <p>- Klarifikasi Kesesuaian Nilai dan Hasil Survey Objek BPHTB.</p>
                <p>- Penyampaian hasil klarifikasi ke PPAT/PPATS.</p>
                <p>- PPAT/PPATS Mengajukan Jawaban/Catatan Atas Hasil Klarifikasi UPTD PBB & BPHTB.</p>
                <p>- Klarifikasi Jawaban yang disetujui oleh PPAT/PPATS akan diproses validasi (poin a titik 3).</p>
                <p>- Klarifikasi jawaban yang tidak disetujui oleh PPAT/PPATS akan diajukan pencermatan lebih lanjut ke Kepala BKD.</p>
                <p>- Hasil pencermatan Kepala BKD akan disampaikan kembali kepada PPAT/PPATS melalui UPTD PBB & BPHTB.</p>
                <p>- Penyelesaian hasil klarifikasi yang telah dicermati dan disetujui oleh PPAT/PPATS selanjutnya akan diproses validasi (poin a titik 3).</p>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/persyaratan.js') }}"></script>
@endsection