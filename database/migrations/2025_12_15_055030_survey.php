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
        Schema::create('survey', function (Blueprint $table) {
            $table->id();

            // Relasi ke pengajuan
            $table->unsignedBigInteger('pengajuanId')->unique();
            $table->foreign('pengajuanId')->references('id')->on('pengajuan')->onDelete('cascade');
            
            // Relasi ke users
            $table->unsignedBigInteger('surveyorId');
            $table->foreign('surveyorId')->references('id')->on('users')->onDelete('cascade');
            
            // Data Survey
            $table->date('tanggalPelaksanaan')->nullable();
            $table->string('luasTanah')->nullable();
            $table->text('posisiStrategisTanah')->nullable();
            $table->string('luasBangunan')->nullable();
            $table->string('jenisBangunan')->nullable();
            $table->text('catatan')->nullable();
            $table->text('nilaiKhusus')->nullable();
            $table->string('fileFotoBangunan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
};
