<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrevetC extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'judul',
        'deskripsi',
        'hari',
        'tanggal_mulai',
        'tanggal_selesai',
        'harga'
    ];
}
