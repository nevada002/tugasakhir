<?php

namespace App\Models;

use App\Enum\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaKapal extends Model
{
    use HasFactory;

    protected $table = 'nota_kapals';

    protected $fillable = [
        'no_keluhan',
        'no_berita_acara',
        'namakapal',
        'tanggal',
        'deskripsi',
        'lampiranpendukung',
        'status',
        'created_by',
    ];

    public $casts = [
        'tanggal' => 'date',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($data) {
            list($no_keluhan, $no_berita_acara) = static::generateNomor();

            $data->no_keluhan = $no_keluhan;
            $data->no_berita_acara = $no_berita_acara;
            $data->created_by = auth()->id();
            return $data;
        });

        static::created(function($data) {
            $data->hasil()->create([
                'no_keluhan' => $data->no_keluhan,
                'no_berita_acara' => '-',
                'jenis_berita_acara' => 'Berita Acara Nota Kapal',
                'status' => $data->status,
                'user_id' => $data->created_by,
            ]);
        });
    }

    public static function generateNomor()
    {
        $count = self::whereDate('created_at', now()->format('Y-m-d'))->count() + 1;

        return [
            'KEL-NK/' . date('Ymd') . '/' . str_pad($count, 4, '0', STR_PAD_LEFT), // nomor nota/keluhan
            date('dny') . '/BA-KNK/' . $count . '/' . date('Y'), // nomor berita acara
        ];
    }

    public function berita_acara()
    {
        return $this->hasOne(BeritaAcaraNotaKapal::class, 'nota_id', 'id');
    }

    public function hasil()
    {
        return $this->morphOne(Hasil::class, 'nota');
    }
}
