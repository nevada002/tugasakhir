<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcaraNotaKapal extends Model
{
    use HasFactory;
    protected $table = 'berita_acara_nota_kapals';
    protected $guarded = [];

    public  function getDataBaNoKa()
    {
        return $this::count();
    }
    
    public static function getCountDataBaNoKa()
    {
        return self::count();
    }
}
