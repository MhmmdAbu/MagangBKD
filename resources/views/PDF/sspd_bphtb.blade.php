<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 2px; vertical-align: top; }
        .box { border:1px solid #000; padding: 4px; }
    </style>
</head>
<body>

<h3 style="text-align:center;">SURAT SETORAN PAJAK DAERAH (SSPD-BPHTB)</h3>
<hr>

<table>
    <tr>
        <td width="40%">Nama Wajib Pajak</td>
        <td class="box">{{ $data['nama_wajib_pajak'] ?? '-' }}</td>
    </tr>
    <tr>
        <td>NIK</td>
        <td class="box">{{ $data['nik'] ?? '-' }}</td>
    </tr>
    <tr>
        <td>Kelurahan/Desa</td>
        <td class="box">{{ $data['kelurahan_desa_wp'] }}</td>
    </tr>
    <tr>
        <td>RT/RW</td>
        <td class="box">{{ $data['rt_rw_wp'] }}</td>
    </tr>
    <tr>
        <td>Kecamatan</td>
        <td class="box">{{ $data['kecamatan_wp'] }}</td>
    </tr>
    <tr>
        <td>Kabupatan Kota</td>
        <td class="box">{{ $data['kabupaten_kota_wp'] }}</td>
    </tr>
    <tr>
        <td>Kode Pos</td>
        <td class="box">{{ $data['kode_pos'] }}</td>
    </tr>
</table>

<br><br>
<table>
    <tr>
        <td>Nama Subjek PBB</td>
        <td class="box">{{ $data['nama_subjekPBB'] }}</td>
    </tr>
    <tr>
        <td>Nomor Objek Panak (NOP) PBB</td>
        <td class="box">{{ $data['nop_PBB'] }}</td>
    </tr>
    <tr>
        <td>Letak Tanah dan Bangunan</td>
        <td class="box">{{ $data['letak_tnh'] }}</td>
    </tr>
    <tr>
        <td>Kelurahan/Desa</td>
        <td class="box">{{ $data['kelurahan_desa_sp'] }}</td>
    </tr>
    <tr>
        <td>RT/RW</td>
        <td class="box">{{ $data['rt_rw_sp'] }}</td>
    </tr>
    <tr>
        <td>Kecamatan</td>
        <td class="box">{{ $data['kecamatan_sp'] }}</td>
    </tr>
    <tr>
        <td>Kabupatan Kota</td>
        <td class="box">{{ $data['kabupaten_kota_sp'] }}</td>
    </tr>
</table>

<br><br>
<table>
    <tr>
        <td>Luas Tanah</td>
        <td class="box">{{ $data['luas_tanah'] ?? '-' }} m²</td>
    </tr>
    <tr>
        <td>Luas Bangunan</td>
        <td class="box">{{ $data['luas_bangunan'] }}</td>
    </tr>
    <tr>
        <td>NJOP PBB/m²</td>
        <td class="box">{{ $data['njop_pbb_tanah'] }}</td>
    </tr>
    <tr>
        <td>NJOP PBB/m²</td>
        <td class="box">{{ $data['njop_pbb_bangunan'] }}</td>
    </tr>
    <tr>
        <td>Luas x NJOP PBB</td>
        <td class="box">{{ $data['luas_njop_pbb_tanah'] }}</td>
    </tr>
    <tr>
        <td>Luas x NJOP PBB</td>
        <td class="box">{{ $data['luas_njop_pbb_bangunan'] }}</td>
    </tr>
    <tr>
        <td>NJOP PBB/m²</td>
        <td class="box">{{ $data['njop_pbb'] }}</td>
    </tr>
    <tr>
        <td>Harga Transaksi Nilai Pasar</td>
        <td class="box">{{ $data['harga_transaksi'] }}</td>
    </tr>
    <tr>
        <td>Jenis Perolehan Hak Atas Tanah atau dan Bangunan</td>
        <td class="box">{{ $data['jenis_perolehan_hak'] }}</td>
    </tr>
    <tr>
        <td>Nomor Sertifikat</td>
        <td class="box">{{ $data['NomorSertifikat'] }}</td>
    </tr>
</table>

<br><br>
<table>
    <tr>
        <td>Nilai Perolehan Objek Pajak (NPOP)</td>
        <td class="box">Rp. {{ $data['npop'] }}</td>
    </tr>
    <tr>
        <td>Nilai Perolehan Objek Pajak Tidak Kena Pajak (NPOPTKP)</td>
        <td class="box">Rp. {{ $data['npoptkp'] }}</td>
    </tr>
    <tr>
        <td>Nilai Perolehan Objek Pajak Kena Pajak (NPOPKP)</td>
        <td class="box">Rp. {{ $data['npopkp'] }}</td>
    </tr>
    <tr>
        <td>Bea Perolehan Hak Atas Tanah dan Bangunan yang Terutang</td>
        <td class="box">Rp. {{ $data['bphtb_terutang'] }}</td>
    </tr>
    <tr>
        <td>Pengenaan 15% Karena Wasiat/Hibah Wasiat/Pemberian Hak Pengelolaan</td>
        <td class="box">Rp. {{ $data['pengenaan15'] }}</td>
    </tr>
    <tr>
        <td>Bea Perolehan Hak Atas Tanah dan Bangunan yang Harus Dibayar</td>
        <td class="box">Rp. {{ $data['bphtb_bayar'] }}</td>
    </tr>
</table>
<br><br>
<p>Jumlah Setoran (angka): <strong>{{ $data['jumlah_setor_angka'] }}</strong></p>
<p>Jumlah Setoran (huruf): <strong>{{ $data['jumlah_setor_huruf'] }}</strong></p>
<br><br>
<h4>Berkas Persyaratan yang Diupload:</h4>
<table>
@if($data['jenisLayanan'] == 'Waris')
    <tr>
        <td>Scan Keterangan Ahli Waris Asli Telah Dilegalisir</td>
        <td class="box">{{ basename($data['file_keterangan_waris'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan Pernyataan Ahli Waris Asli Telah Dilegalisir</td>
        <td class="box">{{ basename($data['file_pernyataan_waris'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan Kuasa Ahli Waris Asli Telah Dilegalisir</td>
        <td class="box">{{ basename($data['file_kuasa_waris'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan PBB Tahun Terakhir</td>
        <td class="box">{{ basename($data['file_pbb'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan Surat Keterangan Kematian (Jika Telah Meninggal)</td>
        <td class="box">{{ basename($data['file_kematian'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan KIA (Jika Dibawah Umur)</td>
        <td class="box">{{ basename($data['file_kia'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan Sertifikat</td>
        <td class="box">{{ basename($data['file_sertifikat'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan Surat Pernyataan Bermaterai</td>
        <td class="box">{{ basename($data['file_pernyataan_materai'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan KTP dan KK (Semua Ahli Waris)</td>
        <td class="box">{{ basename($data['file_ktp_kk'] ?? 'Tidak ada') }}</td>
    </tr>
@endif
@if($data['jenisLayanan'] == 'Jual Beli')
    <tr>
        <td>Scan KTP Penjual</td>
        <td class="box">{{ basename($data['file_ktp_penjual'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan KTP Pembeli</td>
        <td class="box">{{ basename($data['file_ktp_pembeli'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan Kartu Keluarga Penjual</td>
        <td class="box">{{ basename($data['file_kk_penjual'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan Surat Pernyataan Bermaterai</td>
        <td class="box">{{ basename($data['file_pernyataan_jual_beli'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan Sertifikat Induk/Hasil Pemecahan</td>
        <td class="box">{{ basename($data['file_sertifikat_jual_beli'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan PBB Tahun Terakhir</td>
        <td class="box">{{ basename($data['file_pbb_jual_beli'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan Kwitansi Asli</td>
        <td class="box">{{ basename($data['file_kwitansi_jual_beli'] ?? 'Tidak ada') }}</td>
    </tr>
@endif
@if($data['jenisLayanan'] == 'Hibah')
    <tr>
        <td>Scan KTP Penjual</td>
        <td class="box">{{ basename($data['file_ktp_penjual_hibah'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan KTP Pembeli</td>
        <td class="box">{{ basename($data['file_ktp_pembeli_hibah'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan Kartu Keluarga Penjual</td>
        <td class="box">{{ basename($data['file_kk_penjual_hibah'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan Kartu Keluarga Pembeli</td>
        <td class="box">{{ basename($data['file_kk_pembeli_hibah'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan Sertifikat</td>
        <td class="box">{{ basename($data['file_sertifikat_hibah'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan PBB</td>
        <td class="box">{{ basename($data['file_pbb_hibah'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan Surat Pernyataan Bermaterai</td>
        <td class="box">{{ basename($data['file_pernyataan_hibah'] ?? 'Tidak ada') }}</td>
    </tr>
@endif
@if($data['jenisLayanan'] == 'ptsl')
    <tr>
        <td>Scan KTP Penjual</td>
        <td class="box">{{ basename($data['file_ktp_penjual_ptsl'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan KTP Pembeli</td>
        <td class="box">{{ basename($data['file_ktp_pembeli_ptsl'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan Kartu Keluarga Penjual</td>
        <td class="box">{{ basename($data['file_kk_penjual_ptsl'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan Kartu Keluarga Pembeli</td>
        <td class="box">{{ basename($data['file_kk_pembeli_ptsl'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan Sertifikat PTSL/PRONA</td>
        <td class="box">{{ basename($data['file_sertifikat_ptsl'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan PBB Tahun Terakhir</td>
        <td class="box">{{ basename($data['file_pbb_ptsl'] ?? 'Tidak ada') }}</td>
    </tr>
    <tr>
        <td>Scan Surat Pernyataan Bermaterai</td>
        <td class="box">{{ basename($data['file_pernyataan_ptsl'] ?? 'Tidak ada') }}</td>
    </tr>
@endif
</table>
</body>
</html>