<?php
// app/Models/ItemSeminar.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemSeminar extends Model
{
    use HasFactory;

    protected $table = 'item_seminar';
    
    protected $fillable = [
        'gambar',
        'judul',
        'deskripsi',
        'tanggal',
        'harga'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'harga' => 'decimal:2'
    ];

    // Relasi one-to-one ke DetailSeminar
    public function detailSeminar()
    {
        return $this->hasOne(DetailSeminar::class, 'item_seminar_id');
    }
}