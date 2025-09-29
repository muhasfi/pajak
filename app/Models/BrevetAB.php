<?php
// app/Models/BrevetAB.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrevetAB extends Model
{
    use HasFactory;

    protected $table = 'brevet_a_b';
    
    protected $casts = [
        'gambar',
        'judul',
        'deskripsi',
        'hari',
        'tanggal_mulai' => 'datetime',
        'tanggal_selesai' => 'datetime',
        'harga'
    ];

    public function detail()
    {
        return $this->hasOne(DetailBrevetab::class, 'brevetab_id');
    }
}