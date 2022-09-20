<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcaraNotaKapal extends Model
{
    use HasFactory;

    protected $table = 'berita_acara_nota_kapals';

    protected $fillable = [
        'nota_id',
        'nomor_surat',
        'tanggal',
        'nama_perusahaan',
        'no_surat_perusahaan',
        'tanggal_surat',
        'perihal',
        'dibuatoleh',
        'keterangan',
        'lampiranpendukung',
        'pic',
        'penanda_tangan_id',
        'penanda_tangan_status',
        'penanda_tangan_time',
        'penanda_tangan_keterangan',
        'pihak_verifikasi_id',
        'pihak_verifikasi_status',
        'pihak_verifikasi_time',
        'pihak_verifikasi_keterangan',
    ];

    public $casts = [
        'tanggal' => 'date',
        'tanggal_surat' => 'date',
        'penanda_tangan_time' => 'datetime',
        'pihak_verifikasi_time' => 'datetime',
    ];

    public function nota()
    {
        return $this->belongsTo(NotaKapal::class, 'nota_id', 'id');
    }

    public function penanda_tangan()
    {
        return $this->belongsTo(User::class, 'penanda_tangan_id', 'id');
    }

    public function pihak_verifikasi()
    {
        return $this->belongsTo(User::class, 'pihak_verifikasi_id', 'id');
    }

    public function hasil()
    {
        return $this->morphOne(Hasil::class, 'berita_acara');
    }
}
