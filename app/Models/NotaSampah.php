<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaSampah extends Model
{
    use HasFactory;
    protected $table = 'nota_sampahs';
    protected $guarded = [];
    
    public function getDataNoSa()
    {
        return $this->count();
    }
}
