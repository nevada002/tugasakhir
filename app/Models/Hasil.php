<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'no_berita_acara', 'jenis_berita_acara', 'status_id'];

    public function status()
    {
        return $this->belongsTo(StatusBeritaAcara::class);
    }
}
