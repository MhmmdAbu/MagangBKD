<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Permohonan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/pengajuan.css')}}">
    
</head>
<body>

@include('navigation.navbar')



<section class="hero pengajuan-hero">
    <div class="hero-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
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
            <form action="{{ route('pengajuan.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Pilih Layanan -->
                <h3 class="text-start mb-4">Pilih Layanan</h3><hr>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="jenisLayanan" class="form-label">Jenis Layanan:</label>
                        <select class="form-control" id="jenisLayanan" name="jenisLayanan" required>
                            <option value="" disabled selected>Pilih Layanan</option>
                            <option value="jual_beli">Jual Beli</option>
                            <option value="hibah">Hibah</option>
                            <option value="waris">Waris</option>
                            <option value="ptsl">PTSL</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="nomor_surat_masuk" class="form-label">Nomor Surat Masuk:</label>
                        <input type="text" class="form-control" id="nomor_surat_masuk" name="nomor_surat_masuk">
                    </div>
                </div>

                <!-- Data Pemohon Wajib Pajak -->
                <h3 class="text-start mb-4">Data Pemohon (Wajib Pajak)</h3><hr>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama_wajib_pajak" class="form-label">Nama Wajib Pajak:</label>
                        <input type="text" class="form-control" id="nama_wajib_pajak" name="nama_wajib_pajak">
                    </div>
                    <div class="col-md-6">
                        <label for="nik" class="form-label">NIK:</label>
                        <input type="text" class="form-control" id="nik" name="nik">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="kelurahan_desa_wp" class="form-label">Kelurahan/Desa:</label>
                        <input type="text" class="form-control" id="kelurahan_desa_wp" name="kelurahan_desa_wp">
                    </div>
                    <div class="col-md-6">
                        <label for="rt_rw_wp" class="form-label">RT/RW:</label>
                        <input type="text" class="form-control" id="rt_rw_wp" name="rt_rw_wp">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">  
                        <label for="kecamatan_wp" class="form-label">Kecamatan:</label>
                        <input type="text" class="form-control" id="kecamatan_wp" name="kecamatan_wp">
                    </div>
                    <div class="col-md-6">
                        <label for="kabupaten_kota_wp" class="form-label">Kabupaten Kota:</label>
                        <input type="text" class="form-control" id="kabupaten_kota_wp" name="kabupaten_kota_wp">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="kode_pos" class="form-label">Kode Pos:</label>
                        <input type="text" class="form-control" id="kode_pos" name="kode_pos">
                    </div>
                    <div class="col-md-6">
                        <label for="nomor_tlp" class="form-label">Nomor Tlp/Wa Wajib Pajak:</label>
                        <input type="text" class="form-control" id="nomor_tlp" name="nomor_tlp">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="alamat_wp" class="form-label">Alamat Wajib Pajak:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat_wp">
                    </div>
                    <div class="col-md-6">
                        <label for="npwp" class="form-label">Npwp :</label>
                        <input type="text" class="form-control" id="npwp" name="npwp">
                    </div>
                </div>

                <!-- Data Subjek PBB -->
                <h3 class="text-start mb-4">Data Subjek PBB</h3><hr>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama_subjekPBB" class="form-label">Nama Subjek PBB:</label>
                        <input type="text" class="form-control" id="nama_subjekPBB" name="nama_subjekPBB">
                    </div>
                    <div class="col-md-6">
                        <label for="nop_PBB" class="form-label">Nomor Objek Pajak (NOP) PBB:</label>
                        <input type="text" class="form-control" id="nop_PBB" name="nop_PBB">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="kelurahan_desa_sp" class="form-label">Kelurahan/Desa:</label>
                        <input type="text" class="form-control" id="kelurahan_desa_sp" name="kelurahan_desa_sp">
                    </div>
                    <div class="col-md-6">
                        <label for="kecamatan_sp" class="form-label">Kecamatan:</label>
                        <input type="text" class="form-control" id="kecamatan_sp" name="kecamatan_sp">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="rt_rw_sp" class="form-label">RT/RW:</label>
                        <input type="text" class="form-control" id="rt_rw_sp" name="rt_rw_sp">
                    </div>
                    <div class="col-md-6">
                        <label for="kabupaten_kota_sp" class="form-label">Kabupaten Kota:</label>
                        <input type="text" class="form-control" id="kabupaten_kota_sp" name="kabupaten_kota_sp">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="letak_tnh" class="form-label">Alamat Wajib Pajak:</label>
                    <input type="text" class="form-control" id="letak_tnh" name="letak_tnh">
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
                        <input type="text" class="form-control" id="luas_tanah" name="luas_tanah">
                    </div>
                    <div class="col-md-6">
                        <label for="luas_bangunan" class="form-label">Luas Bangunan:</label>
                        <input type="text" class="form-control" id="luas_bangunan" name="luas_bangunan">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="njop_pbb_tanah" class="form-label">NJOP PBB/m2:</label>
                        <input type="text" class="form-control" id="njop_pbb_tanah" name="njop_pbb_tanah">
                    </div>
                    <div class="col-md-6">
                        <label for="njop_pbb_bangunan" class="form-label">NJOP PBB/m2:</label>
                        <input type="text" class="form-control" id="njop_pbb_bangunan" name="njop_pbb_bangunan">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="luas*njop_pbb_tanah" class="form-label">Luas x NJOP PBB:</label>
                        <input type="text" class="form-control" id="luas_njop_pbb_tanah" name="luas_njop_pbb_tanah">
                    </div>
                    <div class="col-md-6">
                        <label for="luas*njop_pbb_bangunan" class="form-label">Luas x NJOP PBB:</label>
                        <input type="text" class="form-control" id="luas_njop_pbb_bangunan" name="luas_njop_pbb_bangunan">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="njop_pbb" class="form-label">NJOP PBB/m2:</label>
                        <input type="text" class="form-control" id="njop_pbb" name="njop_pbb">
                    </div>
                    <div class="col-md-6">
                        <label for="harga_transaksi" class="form-label">Harga Transaksi Nilai Pasar</label>
                        <input type="text" class="form-control" id="harga_transaksi" name="harga_transaksi">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="jenis_perolehan_hak" class="form-label">Jenis Perolehan hak atas tanah atau dan bangunan</label>
                        <input type="text" class="form-control" id="jenis_perolehan_hak" name="jenis_perolehan_hak">
                    </div>
                    <div class="col-md-6">
                        <label for="Nomor Sertifikat" class="form-label">Nomor Sertifikat</label>
                        <input type="text" class="form-control" id="NomorSertifikat" name="NomorSertifikat">
                    </div>
                </div>

                <!-- Penghitungan PBB -->
                <h3 class="text-start mb-4">Penghitungan PBB</h3><hr>
                <div class="row mb-3">
                    <label for="npop" class="form-label">Nilai Perolehan Objek Pajak (NPOP)</label>
                    <input type="text" class="form-control" id="npop" name="npop">
                </div>
                <div class="row mb-3">
                    <label for="npoptkp" class="form-label">Nilai Perolehan Objek Pajak Tidak Kena Pajak (NPOPTKP)</label>
                    <input type="text" class="form-control" id="npoptkp" name="npoptkp">
                </div>
                <div class="row mb-3">
                    <label for="npopkp" class="form-label">Nilai Perolehan Objek Pajak Kena Pajak (NPOPKP)</label>
                    <input type="text" class="form-control" id="npopkp" name="npopkp">
                </div>
                <div class="row mb-3">
                    <label for="bphtb_terutang" class="form-label">Bea Perolehan hak atas tanah dan bangunan yang terutang</label>
                    <input type="text" class="form-control" id="bphtb_terutang" name="bphtb_terutang">
                </div>
                <div class="row mb-3">
                    <label for="pengenaan15%" class="form-label">Pengenaan 15% karena Wasiat/Hibah Wasiat/Pemberian Hak Pengelolaan</label>
                    <input type="text" class="form-control" id="pengenaan15" name="pengenaan15">
                </div>
                <div class="row mb-3">
                    <label for="bphtb_bayar" class="form-label">Bea Perolehan Hak atas Tanah dan Bangunan yang harus dibayar</label>
                    <input type="text" class="form-control" id="bphtb_bayar" name="bphtb_bayar">
                </div>
                
                <!-- Jumlah Setoran -->
                <h3 class="text-start mb-4">Jumlah Setoran</h3><hr>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="jumlah_setor_angka" class="form-label">Jumlah yang disetor (dengan angka)</label>
                        <input type="text" class="form-control" id="jumlah_setor_angka" name="jumlah_setor_angka">
                    </div>
                    <div class="col-md-6">
                        <label for="jumlah_setor_huruf" class="form-label">Jumlah yang disetor (dengan huruf)</label>
                        <input type="text" class="form-control" id="jumlah_setor_huruf" name="jumlah_setor_huruf">
                    </div>
                </div>

                <!-- Berkas Persyaratan -->
                <h3 class="text-start mb-4">Upload Berkas Persyaratan</h3><hr>

                <!-- File untuk Jual Beli -->
                <div id="files-jual_beli" class="file-section" style="display: none;">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_ktp_penjual">Scan KTP Penjual:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_ktp_penjual">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_ktp_penjual" id="file_ktp_penjual" 
                                        onchange="updateFileName(this, 'name_ktp_penjual')">
                                    <span id="name_ktp_penjual" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_ktp_pembeli">Scan KTP Pembeli:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_ktp_pembeli">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_ktp_pembeli" id="file_ktp_pembeli" 
                                        onchange="updateFileName(this, 'name_ktp_pembeli')">
                                    <span id="name_ktp_pembeli" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_kk_penjual">Scan Kartu Keluarga Penjual:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_kk_penjual">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_kk_penjual" id="file_kk_penjual" 
                                        onchange="updateFileName(this, 'name_kk_penjual')">
                                    <span id="name_kk_penjual" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_kk_pembeli">Scan Kartu Keluarga Pembeli:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_kk_pembeli">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_kk_pembeli" id="file_kk_pembeli" 
                                        onchange="updateFileName(this, 'name_kk_pembeli')">
                                    <span id="name_kk_pembeli" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_pernyataan_jual_beli">Scan Surat Pernyataan Bermaterai:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_pernyataan_jual_beli">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_pernyataan_jual_beli" id="file_pernyataan_jual_beli"
                                        onchange="updateFileName(this, 'name_pernyataan_jual_beli')">
                                    <span id="name_pernyataan_jual_beli" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_sertifikat_jual_beli">Scan Sertifikat Induk/Hasil Pemecahan:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_sertifikat_jual_beli">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_sertifikat_jual_beli" id="file_sertifikat_jual_beli"
                                        onchange="updateFileName(this, 'name_sertifikat_jual_beli')">
                                    <span id="name_sertifikat_jual_beli" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_pbb_jual_beli">Scan PBB Tahun Terakhir:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_pbb_jual_beli">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_pbb_jual_beli" id="file_pbb_jual_beli"
                                        onchange="updateFileName(this, 'name_pbb_jual_beli')">
                                    <span id="name_pbb_jual_beli" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_kwitansi_jual_beli">Scan Kwitansi Asli:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_kwitansi_jual_beli">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_kwitansi_jual_beli" id="file_kwitansi_jual_beli"
                                        onchange="updateFileName(this, 'name_kwitansi_jual_beli')">
                                    <span id="name_kwitansi_jual_beli" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- File untuk Hibah -->
                <div id="files-hibah" class="file-section" style="display: none;">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_ktp_penjual_hibah">Scan KTP Penjual:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_ktp_penjual_hibah">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_ktp_penjual_hibah" id="file_ktp_penjual_hibah" 
                                        onchange="updateFileName(this, 'name_ktp_penjual_hibah')">
                                    <span id="name_ktp_penjual_hibah" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_ktp_pembeli_hibah">Scan KTP Pembeli:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_ktp_pembeli_hibah">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_ktp_pembeli_hibah" id="file_ktp_pembeli_hibah" 
                                        onchange="updateFileName(this, 'name_ktp_pembeli_hibah')">
                                    <span id="name_ktp_pembeli_hibah" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_kk_penjual_hibah">Scan Kartu Keluarga Penjual:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_kk_penjual_hibah">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_kk_penjual_hibah" id="file_kk_penjual_hibah" 
                                        onchange="updateFileName(this, 'name_kk_penjual_hibah')">
                                    <span id="name_kk_penjual_hibah" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_kk_pembeli_hibah">Scan Kartu Keluarga Pembeli:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_kk_pembeli_hibah">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_kk_pembeli_hibah" id="file_kk_pembeli_hibah" 
                                        onchange="updateFileName(this, 'name_kk_pembeli_hibah')">
                                    <span id="name_kk_pembeli_hibah" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_sertifikat_hibah">Scan Sertifikat:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_sertifikat_hibah">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_sertifikat_hibah" id="file_sertifikat_hibah"
                                        onchange="updateFileName(this, 'name_sertifikat_hibah')">
                                    <span id="name_sertifikat_hibah" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_pbb_hibah">Scan PBB:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_pbb_hibah">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_pbb_hibah" id="file_pbb_hibah"
                                        onchange="updateFileName(this, 'name_pbb_hibah')">
                                    <span id="name_pbb_hibah" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_pernyataan_hibah">Scan Surat Pernyataan Bermaterai:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_pernyataan_hibah">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_pernyataan_hibah" id="file_pernyataan_hibah"
                                        onchange="updateFileName(this, 'name_pernyataan_hibah')">
                                    <span id="name_pernyataan_hibah" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <!-- File untuk PTSL/PRONA -->
                <div id="files-ptsl" class="file-section" style="display: none;">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_ktp_penjual_ptsl">Scan KTP Penjual:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_ktp_penjual_ptsl">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_ktp_penjual_ptsl" id="file_ktp_penjual_ptsl" 
                                        onchange="updateFileName(this, 'name_ktp_penjual_ptsl')">
                                    <span id="name_ktp_penjual_ptsl" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_ktp_pembeli_ptsl">Scan KTP Pembeli:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_ktp_pembeli_ptsl">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_ktp_pembeli_ptsl" id="file_ktp_pembeli_ptsl" 
                                        onchange="updateFileName(this, 'name_ktp_penjual_ptsl')">
                                    <span id="name_ktp_penjual_ptsl" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_kk_penjual_ptsl">Scan Kartu Keluarga Penjual:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_kk_penjual_ptsl">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_kk_penjual_ptsl" id="file_kk_penjual_ptsl" 
                                        onchange="updateFileName(this, 'name_kk_penjual_ptsl')">
                                    <span id="name_kk_penjual_ptsl" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_kk_pembeli_ptsl">Scan Kartu Keluarga Pembeli:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_kk_pembeli_ptsl">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_kk_pembeli_ptsl" id="file_kk_pembeli_ptsl" 
                                        onchange="updateFileName(this, 'name_kk_pembeli_ptsl')">
                                    <span id="name_kk_pembeli_ptsl" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_sertifikat_ptsl">Scan Sertifikat PTSL/PRONA:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_sertifikat_ptsl">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_sertifikat_ptsl" id="file_sertifikat_ptsl"
                                        onchange="updateFileName(this, 'name_sertifikat_ptsl')">
                                    <span id="name_sertifikat_ptsl" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_pbb_ptsl">Scan PBB Tahun Terakhir:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_pbb_ptsl">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_pbb_ptsl" id="file_pbb_ptsl"
                                        onchange="updateFileName(this, 'name_pbb_ptsl')">
                                    <span id="name_pbb_ptsl" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_pernyataan_ptsl">Scan Surat Pernyataan Bermaterai:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_pernyataan_ptsl">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_pernyataan_ptsl" id="file_pernyataan_ptsl"
                                        onchange="updateFileName(this, 'name_pernyataan_ptsl')">
                                    <span id="name_pernyataan_ptsl" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- File untuk Ahli Waris -->
                <div id="files-waris" class="file-section" style="display: none;">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_keterangan_waris">Scan Keterangan Ahli Waris Asli Telah Dilegalisir:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_keterangan_waris">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_keterangan_waris" id="file_keterangan_waris"  
                                        onchange="updateFileName(this, 'name_keterangan_waris')">
                                    <span id="name_keterangan_waris" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_pernyataan_waris">Scan Pernyataan Ahli Waris Asli Telah Dilegalisir:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_pernyataan_waris">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_pernyataan_waris" id="file_pernyataan_waris" 
                                        onchange="updateFileName(this, 'name_pernyataan_waris')">
                                    <span id="name_pernyataan_waris" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_kuasa_waris">Scan Kuasa Ahli Waris Asli Telah Dilegalisir:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_kuasa_waris">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_kuasa_waris" id="file_kuasa_waris"
                                        onchange="updateFileName(this, 'name_kuasa_waris')">
                                    <span id="name_kuasa_waris" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_pbb">Scan PBB Tahun Terakhir:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_pbb">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_pbb" id="file_pbb" 
                                        onchange="updateFileName(this, 'name_pbb')">
                                    <span id="name_pbb" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_kematian">Scan Surat Keterangan Kematian (Jika Telah Meninggal):</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_kematian">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_kematian" id="file_kematian"
                                        onchange="updateFileName(this, 'name_kematian')">
                                    <span id="name_kematian" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_kia">Scan KIA (Jika Dibawah Umur):</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_kia">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_kia" id="file_kia"
                                        onchange="updateFileName(this, 'name_kia')">
                                    <span id="name_kia" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_sertifikat">Scan Sertifikat:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_sertifikat">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_sertifikat" id="file_sertifikat" 
                                        onchange="updateFileName(this, 'name_sertifikat')">
                                    <span id="name_sertifikat" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_pernyataan_materai">Scan Surat Pernyataan Bermaterai:</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_pernyataan_materai">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_pernyataan_materai" id="file_pernyataan_materai" 
                                        onchange="updateFileName(this, 'name_pernyataan_materai')">
                                    <span id="name_pernyataan_materai" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="file-group">
                                <label for="file_ktp_kk">Scan KTP dan KK (Semua Ahli Waris):</label>
                                <div class="custom-file-input-group">
                                    <label class="btn-choose-file" for="file_ktp_kk">
                                        Choose File
                                    </label>
                                    <input type="file" name="file_ktp_kk" id="file_ktp_kk" 
                                        onchange="updateFileName(this, 'name_ktp_kk')">
                                    <span id="name_ktp_kk" class="file-name-display">No File Choosen</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">Ajukan Permohonan</button>
                </div>
            </form>
        </div>

        <!-- Riwayat Permohonan -->
        <div class="form-container" id="form-riwayat" style="display: none;">
            <form id="filterForm" method="GET" action="{{ route('pengajuan') }}">
                <div class="filter-controls">
                    <div class="input-group">
                        <input type="date" name="tanggal" id="filterTanggal" class="form-control">
                    </div>

                    <input type="search" name="search" id="filterSearch"
                        class="form-control search-input" placeholder="Cari ...">

                    <select class="form-select" name="status" id="filterStatus">
                        <option value="">Status</option>
                        <option value="Pendaftaran">Pendaftaran</option>
                        <option value="Survey">Survey</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </div>
            </form>

            <div class="table-responsive" id='riwayat-container'>
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
                        @forelse ($riwayat as $index => $item)
                            <tr>
                                <td>{{ ($riwayat->currentPage()-1) * $riwayat->perPage() + ($index+1) }}</td>
                                <td>{{ $item->nomor_surat_masuk }}</td>
                                <td>{{ $item->created_at->format('d F Y') }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="{{ route('pdf.preview', ['namaPDF'=>$item->file_blanko]) }}" target="_blank">
                                        Lihat Surat
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $riwayat->links() }}
                </div>

            </div>
        </div>
    </div>   
</section> 

@if(session('show_modal'))
<div class="modal fade show" id="modalSSPD" style="display:block;" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Preview Blanko SSPD BPHTB</h5>
                <form action="{{ route('modal.close') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-close"></button>
                </form>
            </div>
            <div class="modal-body">
                <!-- Embed PDF untuk preview -->
                @if(session('namaPDF'))
                    <iframe 
                        src="{{ route('pdf.preview', ['namaPDF' => session('namaPDF')]) }}" 
                        width="100%" 
                        height="600px">
                    </iframe>
                @else
                    <p class="text-danger">Gagal memuat PDF — namaPDF tidak ditemukan.</p>
                @endif
            </div>
            <div class="modal-footer">
                <a href="{{ route('pdf.download', ['namaPDF' => session('namaPDF')]) }}" target="_blank" class="btn btn-success">
                    Download PDF
                </a>
                <form action="{{ route('hapus.pengajuan') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Modal Preview -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Preview File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="previewImage" src="" style="max-width:100%; display:none;">
                <iframe id="previewPDF" style="width:100%;height:500px; display:none;" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>

document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('modalSSPD');
    const btnClose = modal.querySelector('.btn-close');
    if (btnClose) {
        btnClose.addEventListener('click', function() {
            const bsModal = new bootstrap.Modal(modal);
            bsModal.hide();
            window.location.href = window.location.href; 
        });
    }
    const btnKirim = modal.querySelector('.btn-secondary');
    if (btnKirim) {
        btnKirim.addEventListener('click', function() {
            const bsModal = new bootstrap.Modal(modal);
            bsModal.hide();
            window.location.href = window.location.href;
        });
    }
});

// Script untuk menampilkan berkas yang telah diupload
document.querySelectorAll('input[type="file"]').forEach(input => {
    input.addEventListener('change', function() {
        const fileName = this.files.length > 0 ? this.files[0].name : 'No File Choosen';
        const previewUrl = URL.createObjectURL(this.files[0]);
        const displayId = 'name_' + this.name.replace('file_', '');
        const displayElement = document.getElementById(displayId);

        if (displayElement) {
            displayElement.textContent = fileName;
            displayElement.style.cursor = "pointer";

            displayElement.onclick = () => {
                const ext = this.files[0].type;

                document.getElementById("previewImage").style.display = "none";
                document.getElementById("previewPDF").style.display = "none";

                if (ext.startsWith("image/")) {
                    document.getElementById("previewImage").src = previewUrl;
                    document.getElementById("previewImage").style.display = "block";
                }
                else if (ext === "application/pdf") {
                    document.getElementById("previewPDF").src = previewUrl;
                    document.getElementById("previewPDF").style.display = "block";
                } else {
                    alert("Preview tidak tersedia selain gambar atau PDF.");
                    return;
                }

                new bootstrap.Modal(document.getElementById("previewModal")).show();
            };
        }
    });
});

// Script Untuk Mengatasi Switch Tombol
document.addEventListener('DOMContentLoaded', function() {
    const tabAjukan = document.getElementById('tab-ajukan');
    const tabRiwayat = document.getElementById('tab-riwayat');
    const formAjukan = document.getElementById('form-ajukan');
    const formRiwayat = document.getElementById('form-riwayat');

    function activateTab(activeTab, activeForm, inactiveTab, inactiveForm) {
        activeTab.classList.add('active');
        inactiveTab.classList.remove('active');
        activeForm.style.display = 'block';
        inactiveForm.style.display = 'none';
    }

    // ===========================
    // 1️⃣ CHECK TAB YANG TERAKHIR AKTIF
    // ===========================
    const savedTab = localStorage.getItem('activeTab');

    if (savedTab === 'riwayat') {
        activateTab(tabRiwayat, formRiwayat, tabAjukan, formAjukan);
    } else {
        activateTab(tabAjukan, formAjukan, tabRiwayat, formRiwayat);
    }

    // ===========================
    // 2️⃣ SIMPAN TAB KETIKA DIKLIK
    // ===========================
    tabAjukan.addEventListener('click', () => {
        activateTab(tabAjukan, formAjukan, tabRiwayat, formRiwayat);
        localStorage.setItem('activeTab', 'ajukan');
    });

    tabRiwayat.addEventListener('click', () => {
        activateTab(tabRiwayat, formRiwayat, tabAjukan, formAjukan);
        localStorage.setItem('activeTab', 'riwayat');
    });
});

// Script untuk menampilkan file upload berdasarkan layanan yang dipilih
document.addEventListener('DOMContentLoaded', function() {
    const layananSelect = document.getElementById('jenisLayanan');
    const fileSections = document.querySelectorAll('.file-section');

    function showFileSection(selectedValue) {
        // Sembunyikan semua file sections
        fileSections.forEach(section => {
            section.style.display = 'none';
        });

        // Tampilkan file section yang sesuai
        if (selectedValue) {
            const targetSection = document.getElementById('files-' + selectedValue);
            if (targetSection) {
                targetSection.style.display = 'block';
            }
        }
    }

    // Event listener untuk perubahan dropdown
    layananSelect.addEventListener('change', function() {
        showFileSection(this.value);
    });

    // Inisialisasi: sembunyikan semua jika belum ada yang dipilih
    showFileSection(layananSelect.value);
});

document.addEventListener("DOMContentLoaded", function() {

    const filterForm = document.getElementById('filterForm');
    const searchInput = document.getElementById('filterSearch');
    const dateInput   = document.getElementById('filterTanggal');
    const statusInput = document.getElementById('filterStatus');

    let typingTimer;
    const debounceTime = 500; // ms

    // 1. Auto filter saat mengetik
    searchInput.addEventListener('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(() => {
            filterForm.submit();
        }, debounceTime);
    });

    // 2. Auto filter saat pilih tanggal
    dateInput.addEventListener('change', function () {
        filterForm.submit();
    });

    // 3. Auto filter saat pilih status
    statusInput.addEventListener('change', function () {
        filterForm.submit();
    });

});
</script>
