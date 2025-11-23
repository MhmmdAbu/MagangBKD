<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';

    protected $fillable = [
        'nama_wajib_pajak', 'nik', 'kelurahan_desa_wp', 'rt_rw_wp', 'kecamatan_wp', 'kabupaten_kota_wp',
        'kode_pos', 'nomor_tlp', 'alamat_wp',

        'nama_subjekPBB', 'nop_PBB', 'kelurahan_desa_sp', 'kecamatan_sp',
        'rt_rw_sp', 'kabupaten_kota_sp', 'letak_tnh',

        'luas_tanah', 'luas_bangunan', 'njop_pbb_tanah', 'njop_pbb_bangunan',
        'luas_njop_tanah', 'luas_njop_bangunan', 'njop_pbb', 'harga_transaksi',
        'jenis_perolehan_hak', 'nomor_sertifikat',

        'npop', 'npoptkp', 'npopkp', 'bphtb_terutang', 'pengenaan_15', 'bphtb_bayar',

        'jumlah_setor_angka', 'jumlah_setor_huruf',

        'file_keterangan_waris', 'file_pernyataan_waris', 'file_kuasa_waris',
        'file_ktp_kk', 'file_kematian', 'file_kia', 'file_sertifikat',
        'file_pbb', 'file_pernyataan_materai'
    ];
}
