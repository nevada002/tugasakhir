<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcaraNotaPPKB extends Model
{
    use HasFactory;
    protected $table = 'berita_acara_nota_ppkbs';
    protected $guarded = [];

    public  function getDataBaNoPPKB()
    {
        return $this::count();
    }

    public static function getCountDataBaNoPPKB()
    {
        return self::count();
    }
}
