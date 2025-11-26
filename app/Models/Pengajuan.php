<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';

    protected $fillable = [
        'id_ppat','nama_wajib_pajak', 'nik', 'npwp', 'kelurahan_desa_wp', 'rt_rw_wp', 'kecamatan_wp', 'kabupaten_kota_wp',
        'kode_pos', 'nomor_tlp', 'alamat_wp',

        'file_keterangan_waris', 'file_pernyataan_waris', 'file_kuasa_waris',
        'file_ktp_kk', 'file_kematian', 'file_kia', 'file_sertifikat',
        'file_pbb', 'file_pernyataan_materai', 'file_blanko',
    ];
}
