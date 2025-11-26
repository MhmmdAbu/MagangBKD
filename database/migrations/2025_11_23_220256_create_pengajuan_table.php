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
        
            $table->unsignedBigInteger('id_ppat');
            $table->foreign('id_ppat')->references('id')->on('users')->onDelete('cascade');

            // Data Pemohon (Wajib Pajak)
            $table->string('nama_wajib_pajak')->nullable();
            $table->string('nik')->nullable();
            $table->string('kelurahan_desa_wp')->nullable();
            $table->string('rt_rw_wp')->nullable();
            $table->string('kecamatan_wp')->nullable();
            $table->string('kabupaten_kota_wp')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('nomor_tlp')->nullable();
            $table->string('npwp')->nullable();
            $table->text('alamat_wp')->nullable();

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
            $table->string('file_blanko')->nullable();

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
