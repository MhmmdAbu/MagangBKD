<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();

            // Data Pemohon (Wajib Pajak)
            $table->string('nama_wajib_pajak')->nullable();
            $table->string('nik')->nullable();
            $table->string('kelurahan_desa_wp')->nullable();
            $table->string('rt_rw_wp')->nullable();
            $table->string('kecamatan_wp')->nullable();
            $table->string('kabupaten_kota_wp')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('nomor_tlp')->nullable();
            $table->text('alamat_wp')->nullable();

            // Data Subjek PBB
            $table->string('nama_subjekPBB')->nullable();
            $table->string('nop_PBB')->nullable();
            $table->string('kelurahan_desa_sp')->nullable();
            $table->string('kecamatan_sp')->nullable();
            $table->string('rt_rw_sp')->nullable();
            $table->string('kabupaten_kota_sp')->nullable();
            $table->string('letak_tnh')->nullable();

            // NJOP PBB
            $table->string('luas_tanah')->nullable();
            $table->string('luas_bangunan')->nullable();
            $table->string('njop_pbb_tanah')->nullable();
            $table->string('njop_pbb_bangunan')->nullable();
            $table->string('luas_njop_tanah')->nullable();
            $table->string('luas_njop_bangunan')->nullable();
            $table->string('njop_pbb')->nullable();
            $table->string('harga_transaksi')->nullable();
            $table->string('jenis_perolehan_hak')->nullable();
            $table->string('nomor_sertifikat')->nullable();

            // Penghitungan PBB
            $table->string('npop')->nullable();
            $table->string('npoptkp')->nullable();
            $table->string('npopkp')->nullable();
            $table->string('bphtb_terutang')->nullable();
            $table->string('pengenaan_15')->nullable();
            $table->string('bphtb_bayar')->nullable();

            // Jumlah Setoran
            $table->string('jumlah_setor_angka')->nullable();
            $table->string('jumlah_setor_huruf')->nullable();

            // Upload File
            $table->string('file_keterangan_waris')->nullable();
            $table->string('file_pernyataan_waris')->nullable();
            $table->string('file_kuasa_waris')->nullable();
            $table->string('file_ktp_kk')->nullable();
            $table->string('file_kematian')->nullable();
            $table->string('file_kia')->nullable();
            $table->string('file_sertifikat')->nullable();
            $table->string('file_pbb')->nullable();
            $table->string('file_pernyataan_materai')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
