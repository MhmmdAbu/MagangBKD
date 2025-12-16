<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<style>
    body { font-family: Arial, sans-serif; font-size: 13px; margin: 32px; }
    .title { text-align: center; font-size: 19px; font-weight: bold; margin-bottom: 15px; }

    table { width: 100%; border-collapse: collapse; }
    td { vertical-align: top; padding: 3px 0; }

    /* garis input dinamis */
    .input-line { display: inline-block; min-width: 180px; border-bottom: 1px dotted #000; }

    /* format judul bagian */
    .section { margin-top: 14px; font-weight: bold; }
</style>
</head>
<body>

<div class="title">FORMULIR PENELITIAN SPPD-BPHTB</div>

<table>
<tr>
    <td width="50%">
        <table>
            <tr><td width="150px">Lampiran</td><td width="10px">:</td><td>BPHTB</td></tr>
            <tr><td>Hal</td><td>:</td><td>Verifikasi</td></tr>
            <tr><td>Tanggal Terima</td><td>:</td><td><span class="input-line">{{ $data['tgl_terima'] }}</span></td></tr>
            <tr><td>Nama Wajib Pajak</td><td>:</td><td><span class="input-line">{{ $data['nama_wajib_pajak'] }}</span></td></tr>
            <tr><td>NPWP</td><td>:</td><td><span class="input-line">{{ $data['npwp'] }}</span></td></tr>
        </table>
    </td>

    <td width="50%">
        <table>
            <tr><td width="150px">NOP</td><td width="10px">:</td><td><span class="input-line">{{ $data['nop'] }}</span></td></tr>
            <tr><td>Alamat</td><td>:</td><td><span class="input-line">{{ $data['alamat'] }}</span></td></tr>
            <tr><td>Desa/Kelurahan</td><td>:</td><td><span class="input-line">{{ $data['desa_kelurahan'] }}</span></td></tr>
            <tr><td>Kecamatan</td><td>:</td><td><span class="input-line">{{ $data['kecamatan'] }}</span></td></tr>
            <tr><td>PPAT/Notaris</td><td>:</td><td><span class="input-line">{{ $data['ppatk_ppats'] }}</span></td></tr>
        </table>
    </td>
</tr>
</table>

<div class="section">Terlampir dokumen sebagai berikut:</div>
<table>
<tr><td>Fotocopy SPPT/STS/Struk ATM bukti pembayaran PBB</td></tr>
<tr><td>Fotocopy identitas (KK/KTP)</td></tr>
<tr><td>Surat kuasa dari wajib pajak</td></tr>
<tr><td>Fotocopy NPWP</td></tr>
<tr><td>Kwitansi pembelian</td></tr>
<tr><td>Surat pernyataan</td></tr>
<tr><td>Dokumen lainnya</td></tr>
</table>

<div class="section">Adapun gambaran umum (deskripsi) tanah dan bangunan sebagai berikut:</div>

<div class="section">A. Jenis Perolehan/Peralihan Hak :</div>

<div class="section">B. Tanah :</div>
<table style="margin-left: 15px;">
    <tr>
        <td width="200px">1. Luas Tanah</td>
        <td width="10px">:</td>
        <td><span class="input-line">{{ $data['luas_tanah'] }} m²</span></td>
    </tr>
    <tr>
        <td>2. Letak / Posisi strategis Tanah</td>
        <td>:</td>
        <td><span class="input-line" style="min-width: 450px;">{{ $data['posisiStrategis'] }}</span></td>
    </tr>
</table>
<br>

<div class="section">C. Bangunan :</div>
<table style="margin-left: 15px;">
    <tr>
        <td width="200px">1. Luas Bangunan</td>
        <td width="10px">:</td>
        <td><span class="input-line">{{ $data['luas_bangunan'] }} m²</span></td>
    </tr>
    <tr>
        <td>2. Jenis/Type Bangunan</td>
        <td>:</td>
        <td><span class="input-line">{{ $data['tipeBangunan'] }}</span></td>
    </tr>
    <tr>
        <td>3. Jumlah Lantai</td>
        <td>:</td>
        <td><span class="input-line">{{ $data['jmlhLantai'] }}</span></td>
    </tr>
    <tr>
        <td>4. Kondisi Umum Fisik Bangunan</td>
        <td>:</td>
        <td><span class="input-line" style="min-width: 450px;">{{ $data['kondisiBangunan'] }}</span></td>
    </tr>
</table>

<div class="section">D. Catatan Khusus :</div>
<span class="input-line" style="min-width: 600px;">{{ $data['catatanKhusus'] }}</span>
<br><br><br>

<table style="margin-top: 25px;">
<tr>
    <td width="50%" style="text-align:center;">
        Pemohon/Pihak Lainnya/Penunjuk Lokasi<br><br><br><br>
        _____________________________
    </td>
    <td width="50%" style="text-align:center;">
        Parepare, {{ $data['tgl_survey'] ?? '__________________' }}<br>
        Tim Survey<br><br><br><br>
        _____________________________
    </td>
</tr>
</table>

</body>
</html>
