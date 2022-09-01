<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcaraNotaSampah extends Model
{
    use HasFactory;
    protected $table = 'berita_acara_nota_sampahs';
    protected $guarded = [];

    public function getDataBaNoSa()
    {
        return $this::count();
    }

    public static function getCountDataBaNoSa()
    {
        return self::count();
    }
}
