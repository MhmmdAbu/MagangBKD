<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';

    protected $fillable = [
        // Data dasar
        'nomor_surat_masuk',
        'status',
        'statusPublic',
        'catatan',
        'jenisLayanan',
        'id_ppat',

        // Data Wajib Pajak
        'nama_wajib_pajak',
        'nik',
        'kelurahan_desa_wp',
        'rt_rw_wp',
        'kecamatan_wp',
        'kabupaten_kota_wp',
        'kode_pos',
        'nomor_tlp',
        'npwp',
        'alamat_wp',

        // Upload File
        'file_ktp_pihak_pertama',
        'file_ktp_pihak_kedua',
        'file_kk_pihak_pertama',
        'file_kk_pihak_kedua',

        'file_blanko',
        'file_pernyataan_materai',
        'file_sertifikat',
        'file_pbb',
        'file_kwitansi',

        'file_keterangan_waris',
        'file_pernyataan_waris',
        'file_kuasa_waris',
        'file_kematian',
        'file_diposisi',
        'file_survey',
        'file_kia',
    ];
}
