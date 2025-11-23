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
        <td class="box">{{ $data['nama_wajib_pajak'] }}</td>
    </tr>
    <tr>
        <td>NIK</td>
        <td class="box">{{ $data['nik'] }}</td>
    </tr>
    <tr>
        <td>Alamat Wajib Pajak</td>
        <td class="box">{{ $data['alamat'] }}</td>
    </tr>
</table>

<br><br>
<!-- lanjutkan sesuai blanko selama isinya sesuai -->
<table>
    <tr>
        <td>Luas Tanah</td>
        <td class="box">{{ $data['luas_tanah'] }} m²</td>
    </tr>
    <tr>
        <td>Harga Transaksi / Nilai Pasar</td>
        <td class="box">{{ $data['harga_transaksi'] }}</td>
    </tr>
</table>

<br><br>
<p>Jumlah Setoran (angka): <strong>{{ $data['jumlah_setor_angka'] }}</strong></p>
<p>Jumlah Setoran (huruf): <strong>{{ $data['jumlah_setor_huruf'] }}</strong></p>

</body>
</html>
