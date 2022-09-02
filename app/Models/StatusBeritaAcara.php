<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusBeritaAcara extends Model
{
    use HasFactory;
    public function hasil()
    {
        return $this->hasOne(Hasil::class);
    }
}
