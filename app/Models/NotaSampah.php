<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaSampah extends Model
{
    use HasFactory;
    protected $table = 'nota_sampahs';
    protected $fillable = [
        'namakapal',
        'tanggal',
        'nomornota',
        'deskripsi',
        'lampiranpendukung',
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
    
    public function getDataNoSa()
    {
        return $this->count();
    }
}
