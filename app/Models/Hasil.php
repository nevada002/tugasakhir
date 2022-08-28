<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    // select * count from nota_kapal join nota_sampah join nota_ppkb on nota_kapal.no_ka = nota_sampah.no_sa and nota_sampah.no_sa = nota_ppkb.no_ppkb
    public function nota_kapal()
    {
        return $this->belongsTo(NotaKapal::class);
    }
    public function nota_ppkb()
    {
        return $this->belongsTo(NotaPPKB::class);
    }
    public function nota_sampah()
    {
        return $this->belongsTo(NotaSampah::class);
    }
}
