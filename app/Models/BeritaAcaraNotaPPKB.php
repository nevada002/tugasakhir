<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcaraNotaPPKB extends Model
{
    use HasFactory;

    protected $table = 'berita_acara_nota_ppkbs';
    protected $fillable = [
        'nota_pkkbs_id',
        'nomor_surat',
        'tanggal',
        'nama_perusahaan',
        'nama_kapal',
        'noppkb',
        'service_code',
        'noukk',
        'agen',
        'lokasi',
        'tujuan',
        'dibuatoleh',
        'alasan',
        'lampiranpendukung',
        'penanda_tangan_id',
        'penanda_tangan_status',
        'penanda_tangan_time',
        'pihak_verifikasi_id',
        'pihak_verifikasi_status',
        'pihak_verifikasi_time',
    ];

    public  function getDataBaNoPPKB()
    {
        return $this::count();
    }

    public static function getCountDataBaNoPPKB()
    {
        return self::count();
    }
}
