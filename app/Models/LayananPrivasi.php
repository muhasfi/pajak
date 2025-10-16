<?php
// app/Models/LayananPrivasi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananPrivasi extends Model
{
    use HasFactory;

    protected $table = 'layanan_privasi';
    
    protected $fillable = [
        'judul',
        'harga'
    ];

    public function privasiDetails()
    {
        return $this->hasMany(PrivasiDetail::class);
    }
}