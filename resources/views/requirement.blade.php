<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat dan Ketentuan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/s&k.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
 @include('navigation.navbar')

<section class="hero">
</section>
<section class="content-section">
    <div class="container">
        <div class="row">

            <!-- Langkah-Langkah -->
            <div class="col-lg-8">
                <h1>Langkah-Langkah Pengajuan Permohonan</h1>
                
                <div class="langkah-item">
                    <h3>1. PPATK Input Data & Upload Berkas</h3>
                    <p>Pemohon (melalui PPATK/Notaris) mengisi formulir data diri, objek pajak, dan mengunggah semua dokumen persyaratan.</p>
                </div>
                <div class="langkah-item">
                    <h3>2. Pengecekan Kelengkapan Data</h3>
                    <p>Sistem/staf memverifikasi apakah semua data dan berkas yang di unggah sudah lengkap. (Jika tidak lengkap: kembali ke langkah 1).</p>
                </div>
                <div class="langkah-item">
                    <h3>3. Disposisi</h3>
                    <p>Berkas diteruskan untuk disposisi persetujuan internal. (Jika tidak disetujui: Kembali ke langkah 1).</p>
                </div>
                <div class="langkah-item">
                    <h3>4. Survey Lapangan</h3>
                    <p>Tim melakukan survey lokasi dan memvalidasi hasil survey terhadap data permohonan. (Jika Tidak Sesuai: Pemohon dipanggil untuk Klarifikasi).</p>
                </div>
                <div class="langkah-item">
                    <h3>5. Penanda Tanganan</h3>
                    <p>Jika semua data sesuai, berkas diproses untuk ditandatangani oleh Pimpinan BKD.</p>
                </div>
            </div>

            <!-- Syarat -->
            <div class="col-lg-4">
                <div class="persyaratan-box">
                    <h3>Persyaratan</h3>
                    <select class="form-select" id="layanan-select" aria-label="Pilih Layanan">
                        <option selected disabled>Pilih Layanan...</option>
                        <option value="layanan1">Jual Beli</option>
                        <option value="layanan2">Hibah</option>
                        <option value="layanan3">Ahli Waris</option>
                        <option value="layanan4">PTSL/PRONA</option>
                    </select>

                    <div class="syarat-text-area" id="syarat-output">
                        Pilih layanan di atas untuk melihat daftar dokumen persyaratan.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/persyaratan.js') }}"></script>
</body>
</html>