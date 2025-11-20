@extends('Layout.utama')

@section('title', 'Kelola Syarat dan Ketentuan')

<link rel="stylesheet" href="{{ asset('css/kelola_s&k.css') }}">

@section('content')
<div class="dashboard-wrapper d-flex">
  <!-- Main Content -->
    <main class="main-content">
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
            <button id="editLayananBtn" class="btn btn-primary">Edit Layanan</button>
            <button id="editPanduanBtn" class="btn btn-primary">Edit Panduan</button>
        </div>

        <section class="steps-box">
        <h2>Langkah-Langkah Pengajuan Permohonan</h2>
        <ol>
            <li><strong>PPATK Input Data & Upload Berkas</strong><br>
            Pemohon (melalui PPATK/Notaris) mengisi formulir data diri, objek pajak, dan mengunggah semua dokumen persyaratan.</li>
            <li><strong>Pengecekan Kelengkapan Data</strong><br>
            Sistem/staf memverifikasi apakah semua data dan berkas yang diunggah sudah lengkap. (Jika tidak lengkap: kembali ke langkah 1).
            </li>
            <li><strong>Disposisi</strong><br>
            Berkas diteruskan untuk disposisi persetujuan internal. (Jika tidak disetujui: Kembali ke langkah 1).
            </li>
            <li><strong>Survey Lapangan</strong><br>
            Tim melakukan survey lokasi dan memvalidasi hasil survey terhadap
            </li>
        </ol>
        </section>
    </main>
    <!-- Modal Edit Layanan -->
    <div class="modal fade" id="modalEditLayanan" tabindex="-1" aria-labelledby="modalEditLayananLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formEditLayanan">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditLayananLabel">Pilih Layanan untuk Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                    <select class="form-select" id="modalLayananSelect" aria-label="Pilih Layanan untuk Edit" required>
                        <option value="" disabled selected>Pilih Layanan...</option>
                        <option value="layanan1">Jual Beli</option>
                        <option value="layanan2">Hibah</option>
                        <option value="layanan3">Ahli Waris</option>
                        <option value="layanan4">PTSL/PRONA</option>
                    </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Form Edit Persyaratan -->
    <div class="modal fade" id="modalFormEdit" tabindex="-1" aria-labelledby="modalFormEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="formPersyaratanEdit">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalFormEditLabel">Edit Persyaratan Layanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editLayananName" class="form-label">Layanan</label>
                            <input type="text" class="form-control" id="editLayananName" readonly />
                        </div>
                        <div class="mb-3">
                            <label for="editPersyaratan" class="form-label">Daftar Persyaratan</label>
                            <textarea id="editPersyaratan" class="form-control" rows="10" required style="font-family: monospace;"></textarea>
                            <small class="form-text text-muted">Edit persyaratan per baris, gunakan tanda strip (-) di awal baris untuk item baru.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Edit Panduan -->
    <div class="modal fade" id="modalEditPanduan" tabindex="-1" aria-labelledby="modalEditPanduanLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="formEditPanduan">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditPanduanLabel">Edit Langkah-Langkah Permohonan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editPanduanTextarea" class="form-label">Langkah-Langkah Permohonan</label>
                            <textarea id="editPanduanTextarea" class="form-control" rows="15" required style="font-family: monospace;"></textarea>
                            <small class="form-text text-muted">Edit panduan dalam format HTML. Pastikan struktur <ol> dan <li> tetap terjaga.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/persyaratanAdmin.js') }}"></script>
@endsection