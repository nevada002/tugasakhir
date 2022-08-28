<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaKapal extends Model
{
    use HasFactory;
    protected $table = 'nota_kapal';
    protected $guarded = [];
    
    public function getDataNoKa()
    {
        return $this->count();
    }
}
