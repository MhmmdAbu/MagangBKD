@extends('Layout.utama')

@section('title','Panduan')

<link rel="stylesheet" href="{{ asset('css/panduan.css') }}">
<link rel="stylesheet" href="{{ asset('js/persyaratan.js') }}">

@section('content')
    {{-- PASTIKAN KEDUA PANEL DIBUNGKUS OLEH DIV DENGAN CLASS "CONTAINER" --}}
    <div class="container">
        {{-- PANEL KIRI (PERSYARATAN) --}}
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

        {{-- PANEL KANAN (LANGKAH-LANGKAH) --}}
        <div class="right-panel">
            <h2>Langkah-Langkah Pengajuan Permohonan</h2>

            <div class="step">
                <div class="step-number">1. PPATK Input Data & Upload Berkas</div>
                <p class="step-description">
                    Pemohon (melalui PPATK/Notaris) mengisi formulir data diri, objek pajak, dan mengunggah semua dokumen persyaratan.
                </p>
            </div>

            <div class="step">
                <div class="step-number">2. Pengecekan Kelengkapan Data</div>
                <p class="step-description">
                    Sistem/staf memverifikasi apakah semua data dan berkas yang di unggah sudah lengkap. (Jika tidak lengkap: kembali ke langkah 1).
                </p>
            </div>

            <div class="step">
                <div class="step-number">3. Disposisi</div>
                <p class="step-description">
                    Berkas diteruskan untuk disposisi persetujuan internal. (Jika tidak disetujui: Kembali ke langkah 1).
                </p>
            </div>

            <div class="step">
                <div class="step-number">4. Survey Lapangan</div>
                <p class="step-description">
                    Tim melakukan survey lokasi dan memvalidasi hasil survey terhadap data permohonan. (Jika Tidak Sesuai: Pemohon dipanggil untuk Klarifikasi).
                </p>
            </div>
            <div class="step">
                <div class="step-number">5. Penanda Tanganan</div>
                <p class="step-description">
                    Jika semua data sesuai, berkas diproses untuk ditandatangani oleh Pimpinan BKD.
                </p>
            </div>
        </div>
    </div>
@endsection