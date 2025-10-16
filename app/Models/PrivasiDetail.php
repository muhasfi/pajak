<?php
// app/Models/PrivasiDetail.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivasiDetail extends Model
{
    use HasFactory;

    protected $table = 'privasi_detail';
    
    protected $fillable = [
        'layanan_privasi_id',
        'waktu_menit',
        'benefit'
    ];

    protected $casts = [
        'benefit' => 'array'
    ];

    public function layananPrivasi()
    {
        return $this->belongsTo(LayananPrivasi::class);
    }
}