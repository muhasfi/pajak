<?php
// app/Models/BrevetAB.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrevetAB extends Model
{
    use HasFactory;

    protected $table = 'brevet_a_b';
    
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
        'deskripsi' => 'array',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function detail()
    {
        return $this->hasOne(DetailBrevetab::class, 'brevetab_id');
    }
}