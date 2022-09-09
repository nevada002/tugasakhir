<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'berita_acara_type',
        'berita_acara_id',
        'no_keluhan',
        'no_berita_acara',
        'jenis_berita_acara',
        'status',
        'user_id',
    ];

    public function berita_acara()
    {
        return $this->morphTo();
    }

    public function agen()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
