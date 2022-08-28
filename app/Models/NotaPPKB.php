<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaPPKB extends Model
{
    use HasFactory;
    protected $table = 'nota_ppkb';
    protected $guarded = [];
    
    public function getDataNoPPKB()
    {
        return $this->count();
    }
}
