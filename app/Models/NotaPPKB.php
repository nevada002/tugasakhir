<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaPPKB extends Model
{
    use HasFactory;
    protected $table = 'nota_ppkbs';
    protected $fillable = [
        'namakapal',
        'negara',
        'noppkb',
        'service',
        'agen',
        'alasan',
        'status',
        'created_by',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($data) {
            $data->created_by = auth()->id();
            return $data;
        });
    }
    
    public function getDataNoPPKB()
    {
        return $this->count();
    }
}
