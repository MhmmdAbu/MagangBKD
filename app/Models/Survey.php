<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $table = 'survey';

    /**
     * Kolom yang boleh diisi
     */
    protected $fillable = [
        'pengajuanId',
        'surveyorId',
        'tanggalPelaksanaan',
        'luasTanah',
        'posisiStrategisTanah',
        'luasBangunan',
        'jenisBangunan',
        'catatan',
        'nilaiKhusus',
        'fileFotoBangunan',
    ];

    /**
     * Casting tipe data
     */
    protected $casts = [
        'tanggalPelaksanaan' => 'date',
    ];

    /**
     * Relasi: Survey dimiliki oleh satu Pengajuan
     */
    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuanId');
    }
    public function surveyor()
    {
        return $this->belongsTo(User::class, 'surveyorId');
    }
}
