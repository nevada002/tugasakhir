<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcaraNotaSampah extends Model
{
    use HasFactory;

    protected $table = 'berita_acara_nota_sampahs';
    protected $fillable = [
        'nota_sampah_id',
        'nomor_surat',
        'tanggal',
        'tanggalnotasampahkapal',
        'dibuatoleh',
        'lampiranpendukung',
        'penanda_tangan_id',
        'penanda_tangan_status',
        'penanda_tangan_time',
        'pihak_verifikasi_id',
        'pihak_verifikasi_status',
        'pihak_verifikasi_time',
    ];

    public function getDataBaNoSa()
    {
        return $this::count();
    }

    public static function getCountDataBaNoSa()
    {
        return self::count();
    }
}
