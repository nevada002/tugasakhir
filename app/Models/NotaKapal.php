<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaKapal extends Model
{
    use HasFactory;
    protected $table = 'nota_kapals';
    protected $guarded = [];

    public function getDataNoKa()
    {
        // format date to date-month-year
        date('d-m-Y', strtotime($this->tanggal));
        return $this::count();
    }
}
