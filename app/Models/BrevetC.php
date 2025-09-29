<?php
// app/Models/BrevetC.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrevetC extends Model
{
    use HasFactory;

    protected $table = 'brevet_c';
    
    protected $fillable = [
        'gambar',
        'judul',
        'deskripsi',
        'hari',
        'tanggal_mulai',
        'tanggal_selesai',
        'harga'
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'harga' => 'decimal:2'
    ];

    // Relasi ke detail
    public function details()
    {
        return $this->hasMany(DetailBrevetC::class, 'brevet_c_id');
    }
}