<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Permohonan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pengajuan.css')}}">
    
</head>
<body>

@include('navigation.navbar')

<section class="hero pengajuan-hero">
    <div class="hero-content">
    </div>
</section>

<!-- Halaman Utama -->
<section class="content-section">
    <div class="container">
        <div class="tab-section">
            <button class="custom-tab active" id="tab-ajukan">Ajukan Permohonan</button>
            <button class="custom-tab" id="tab-riwayat">Riwayat Permohonan</button>
        </div>
        <!-- Form  -->
        <div class="form-container" id="form-ajukan">
            <form action="" method="POST" enctype="multipart/form-data">
           
                <!-- Data Pemohon Wajib Pajak -->
                <h3 class="text-start mb-4">Data Pemohon (Wajib Pajak)</h3><hr>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama_wajib_pajak" class="form-label">Nama Wajib Pajak:</label>
                        <input type="text" class="form-control" id="nama_wajib_pajak" placeholder="Masukkan nama lengkap">
                    </div>
                    <div class="col-md-6">
                        <label for="nik" class="form-label">NIK:</label>
                        <input type="text" class="form-control" id="nik" placeholder="Masukkan NIK">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="kelurahan_desa_wp" class="form-label">Kelurahan/Desa:</label>
                        <input type="text" class="form-control" id="kelurahan_desa_wp" placeholder="Masukkan Kelurahan/Desa">
                    </div>
                    <div class="col-md-6">
                        <label for="rt_rw_wp" class="form-label">RT/RW:</label>
                        <input type="text" class="form-control" id="rt_rw_wp" placeholder="Masukkan RT/RW">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="kecamatan_wp" class="form-label">Kecamatan:</label>
                        <input type="text" class="form-control" id="kecamatan_wp" placeholder="Masukkan Kecamatan">
                    </div>
                    <div class="col-md-6">
                        <label for="kabupaten_kota_wp" class="form-label">Kabupaten Kota:</label>
                        <input type="text" class="form-control" id="kabupaten_kota_wp" placeholder="Masukkan Kabupaten Kota">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="kode_pos" class="form-label">Kode Pos:</label>
                        <input type="text" class="form-control" id="kode_pos" placeholder="Masukkan Kode Pos">
                    </div>
                    <div class="col-md-6">
                        <label for="nomor_tlp" class="form-label">Nomor Tlp/Wa Wajib Pajak:</label>
                        <input type="text" class="form-control" id="nomor_tlp" placeholder="Masukkan Nomor Telepon/WA">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat_wp" class="form-label">Alamat Wajib Pajak:</label>
                    <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat">
                </div>

                <!-- Data Subjek PBB -->
                <h3 class="text-start mb-4">Data Subjek PBB</h3><hr>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama_subjekPBB" class="form-label">Nama Subjek PBB:</label>
                        <input type="text" class="form-control" id="nama_subjekPBB" placeholder="Masukkan Nama Subjek PBB">
                    </div>
                    <div class="col-md-6">
                        <label for="nop_PBB" class="form-label">Nomor Objek Pajak (NOP) PBB:</label>
                        <input type="text" class="form-control" id="nop_PBB" placeholder="Masukkan Objek Pajak PBB">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="kelurahan_desa_sp" class="form-label">Kelurahan/Desa:</label>
                        <input type="text" class="form-control" id="kelurahan_desa_sp" placeholder="Masukkan Kelurahan/Desa">
                    </div>
                    <div class="col-md-6">
                        <label for="kecamatan_sp" class="form-label">Kecamatan:</label>
                        <input type="text" class="form-control" id="kecamatan_sp" placeholder="Masukkan Kabupaten Kota">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="rt_rw_sp" class="form-label">RT/RW:</label>
                        <input type="text" class="form-control" id="rt_rw_sp" placeholder="Masukkan RT/RW">
                    </div>
                    <div class="col-md-6">
                        <label for="kabupaten_kota_sp" class="form-label">Kabupaten Kota:</label>
                        <input type="text" class="form-control" id="kabupaten_kota_sp" placeholder="Masukkan Kabupaten Kota">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="letak_tnh" class="form-label">Alamat Wajib Pajak:</label>
                    <input type="text" class="form-control" id="letak_tnh" placeholder="Masukkan Letak Tanah atau Bangunan">
                </div>
                <h6>Penghitungan NJOP PBB</h6>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6>1. Tanah</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>2. Bangunan</h6>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="luas_tanah" class="form-label">Luas Tanah:</label>
                        <input type="text" class="form-control" id="luas_tanah" placeholder="Masukkan Luas Tanah">
                    </div>
                    <div class="col-md-6">
                        <label for="luas_bangunan" class="form-label">Luas Bangunan:</label>
                        <input type="text" class="form-control" id="luas_bangunan" placeholder="Masukkan Luas Bangunan">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="njop_pbb_tanah" class="form-label">NJOP PBB/m2:</label>
                        <input type="text" class="form-control" id="njop_pbb_tanah" placeholder="Masukkan NJOP PBB Tanah">
                    </div>
                    <div class="col-md-6">
                        <label for="njop_pbb_bangunan" class="form-label">NJOP PBB/m2:</label>
                        <input type="text" class="form-control" id="njop_pbb_bangunan" placeholder="Masukkan NJOP PBB Bangunan">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="luas*njop_pbb_tanah" class="form-label">Luas x NJOP PBB:</label>
                        <input type="text" class="form-control" id="luas*njop_pbb_tanah" placeholder="Masukkan Hasil dari Luas x NJOP PBB">
                    </div>
                    <div class="col-md-6">
                        <label for="luas*njop_pbb_bangunan" class="form-label">Luas x NJOP PBB:</label>
                        <input type="text" class="form-control" id="luas*njop_pbb_bangunan" placeholder="Masukkan Hasil dari Luas x NJOP PBB">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="njop_pbb" class="form-label">NJOP PBB/m2:</label>
                        <input type="text" class="form-control" id="njop_pbb" placeholder="Masukkan Hasil NJOP PBB">
                    </div>
                    <div class="col-md-6">
                        <label for="harga_transaksi" class="form-label">Harga Transaksi Nilai Pasar</label>
                        <input type="text" class="form-control" id="harga_transaksi" placeholder="Masukkan Harga Transaksi Nilai Pasar">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="jenis_perolehan_hak" class="form-label">Jenis Perolehan hak atas tanah atau dan bangunan</label>
                        <input type="text" class="form-control" id="jenis_perolehan_hak" placeholder="">
                    </div>
                    <div class="col-md-6">
                        <label for="Nomor Sertifikat" class="form-label">Nomor Sertifikat</label>
                        <input type="text" class="form-control" id="Nomor Sertifikat" placeholder="Masukkan Nomor Sertifikat">
                    </div>
                </div>

                <!-- Penghitungan PBB -->
                <h3 class="text-start mb-4">Penghitungan PBB</h3><hr>
                <div class="row mb-3">
                    <label for="npop" class="form-label">Nilai Perolehan Objek Pajak (NPOP)</label>
                    <input type="text" class="form-control" id="npop" placeholder="Masukkan Nilai Perolehan Objek Pajak (NPOP)">
                </div>
                <div class="row mb-3">
                    <label for="npoptkp" class="form-label">Nilai Perolehan Objek Pajak Tidak Kena Pajak (NPOPTKP)</label>
                    <input type="text" class="form-control" id="npoptkp" placeholder="Masukkan Nilai Perolehan Objek Pajak Tidak Kena Pajak (NPOPTKP)">
                </div>
                <div class="row mb-3">
                    <label for="npopkp" class="form-label">Nilai Perolehan Objek Pajak Kena Pajak (NPOPKP)</label>
                    <input type="text" class="form-control" id="npopkp" placeholder="Masukkan Nilai Perolehan Objek Pajak Kena Pajak (NPOPKP)">
                </div>
                <div class="row mb-3">
                    <label for="bphtb_terutang" class="form-label">Bea Perolehan hak atas tanah dan bangunan yang terutang</label>
                    <input type="text" class="form-control" id="bphtb_terutang" placeholder="Masukkan Nilai Bea Perolehan hak atas tanah dan bangunan yang terutang">
                </div>
                <div class="row mb-3">
                    <label for="pengenaan15%" class="form-label">Pengenaan 15% karena Wasiat/Hibah Wasiat/Pemberian Hak Pengelolaan</label>
                    <input type="text" class="form-control" id="pengenaan15%" placeholder="Masukkan Nilai Pengenaan 15% karena Wasiat/Hibah Wasiat/Pemberian Hak Pengelolaan">
                </div>
                <div class="row mb-3">
                    <label for="bphtb_bayar" class="form-label">Bea Perolehan Hak atas Tanah dan Bangunan yang harus dibayar</label>
                    <input type="text" class="form-control" id="bphtb_bayar" placeholder="Masukkan Nilai Bea Perolehan hak atas tanah dan bangunan yang terutang">
                </div>
                
                <!-- Jumlah Setoran -->
                <h3 class="text-start mb-4">Jumlah Setoran</h3><hr>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="jumlah_setor_angka" class="form-label">Jumlah yang disetor (dengan angka)</label>
                        <input type="text" class="form-control" id="jumlah_setor_angka" placeholder="">
                    </div>
                    <div class="col-md-6">
                        <label for="jumlah_setor_huruf" class="form-label">Jumlah yang disetor (dengan huruf)</label>
                        <input type="text" class="form-control" id="jumlah_setor_huruf" placeholder="">
                    </div>
                </div>

                <!-- Berkas Persyaratan -->
                <h3 class="text-start mb-4">Upload Berkas Persyaratan</h3><hr>
                <div class="file-group">
                    <label for="file_keterangan_waris">Scan Keterangan Ahli Waris Asli/Dilegalisir:</label>
                    <div class="custom-file-input-group">
                        <label class="btn-choose-file" for="file_keterangan_waris">
                            Choose File
                        </label>
                        <input type="file" name="file_keterangan_waris" id="file_keterangan_waris" required 
                            onchange="updateFileName(this, 'name_keterangan_waris')">
                        <span id="name_keterangan_waris" class="file-name-display">No File Choosen</span>
                    </div>
                </div>
                <div class="file-group">
                    <label for="file_pernyataan_waris">Scan Pernyataan Ahli Waris Asli/Dilegalisir:</label>
                    <div class="custom-file-input-group">
                        <label class="btn-choose-file" for="file_pernyataan_waris">
                            Choose File
                        </label>
                        <input type="file" name="file_pernyataan_waris" id="file_pernyataan_waris" required
                            onchange="updateFileName(this, 'name_pernyataan_waris')">
                        <span id="name_pernyataan_waris" class="file-name-display">No File Choosen</span>
                    </div>
                </div>
                <div class="file-group">
                    <label for="file_kuasa_waris">Scan Kuasa Ahli Waris Asli/Dilegalisir:</label>
                    <div class="custom-file-input-group">
                        <label class="btn-choose-file" for="file_kuasa_waris">
                            Choose File
                        </label>
                        <input type="file" name="file_kuasa_waris" id="file_kuasa_waris"
                            onchange="updateFileName(this, 'name_kuasa_waris')">
                        <span id="name_kuasa_waris" class="file-name-display">No File Choosen</span>
                    </div>
                </div>
                <div class="file-group">
                    <label for="file_ktp_kk">Scan KTP dan KK (Semua Ahli Waris):</label>
                    <div class="custom-file-input-group">
                        <label class="btn-choose-file" for="file_ktp_kk">
                            Choose File
                        </label>
                        <input type="file" name="file_ktp_kk" id="file_ktp_kk" required
                            onchange="updateFileName(this, 'name_ktp_kk')">
                        <span id="name_ktp_kk" class="file-name-display">No File Choosen</span>
                    </div>
                </div>
                <div class="file-group">
                    <label for="file_kematian">Scan Surat Keterangan Kematian (Bagi yang Meninggal):</label>
                    <div class="custom-file-input-group">
                        <label class="btn-choose-file" for="file_kematian">
                            Choose File
                        </label>
                        <input type="file" name="file_kematian" id="file_kematian"
                            onchange="updateFileName(this, 'name_kematian')">
                        <span id="name_kematian" class="file-name-display">No File Choosen</span>
                    </div>
                </div>
                <div class="file-group">
                    <label for="file_kia">Scan KIA (Bagi yang Dibawah Umur):</label>
                    <div class="custom-file-input-group">
                        <label class="btn-choose-file" for="file_kia">
                            Choose File
                        </label>
                        <input type="file" name="file_kia" id="file_kia"
                            onchange="updateFileName(this, 'name_kia')">
                        <span id="name_kia" class="file-name-display">No File Choosen</span>
                    </div>
                </div>
                <div class="file-group">
                    <label for="file_sertifikat">Scan Sertifikat:</label>
                    <div class="custom-file-input-group">
                        <label class="btn-choose-file" for="file_sertifikat">
                            Choose File
                        </label>
                        <input type="file" name="file_sertifikat" id="file_sertifikat" required
                            onchange="updateFileName(this, 'name_sertifikat')">
                        <span id="name_sertifikat" class="file-name-display">No File Choosen</span>
                    </div>
                </div>
                <div class="file-group">
                    <label for="file_pbb">Scan PBB Tahun Terakhir:</label>
                    <div class="custom-file-input-group">
                        <label class="btn-choose-file" for="file_pbb">
                            Choose File
                        </label>
                        <input type="file" name="file_pbb" id="file_pbb" required
                            onchange="updateFileName(this, 'name_pbb')">
                        <span id="name_pbb" class="file-name-display">No File Choosen</span>
                    </div>
                </div>
                <div class="file-group">
                    <label for="file_pernyataan_materai">Scan Surat Pernyataan Bermaterai:</label>
                    <div class="custom-file-input-group">
                        <label class="btn-choose-file" for="file_pernyataan_materai">
                            Choose File
                        </label>
                        <input type="file" name="file_pernyataan_materai" id="file_pernyataan_materai" required
                            onchange="updateFileName(this, 'name_pernyataan_materai')">
                        <span id="name_pernyataan_materai" class="file-name-display">No File Choosen</span>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">Ajukan Permohonan</button>
                </div>
                
            </form>
        </div>

        <!-- Riwayat Permohonan -->
        <div class="form-container" id="form-riwayat" style="display: none;">
            <div class="filter-controls">
                <div class="input-group">
                    <input type="date" class="form-control" placeholder="Tanggal" aria-label="Tanggal" >
                </div>
                <input type="search" class="form-control search-input" placeholder="Cari ...">
                <select class="form-select" aria-label="Status Filter">
                    <option selected>Status</option>
                    <option value="1">Pendaftaran</option>
                    <option value="2">Survey</option>
                    <option value="3">Selesai</option>
                </select>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-riwayat">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 30%;">Nomor Surat</th>
                            <th style="width: 20%;">Tanggal Dikirim</th>
                            <th style="width: 20%;">Status Surat</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>001/A/SURAT/X/2025</td>
                            <td>22 Oktober 2025</td>
                            <td>Pendaftaran</td>
                            <td class="aksi"><a href="#">Lihat Surat</a></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>002/A/SURAT/X/2025</td>
                            <td>22 Oktober 2025</td>
                            <td>Survey</td>
                            <td class="aksi"><a href="#">Lihat Surat</a></td>
                        </tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/pengajuan.js') }}"></script>
</body>
</html>