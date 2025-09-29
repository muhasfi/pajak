<?php
// app/Models/DetailSeminar.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSeminar extends Model
{
    use HasFactory;

    protected $table = 'detail_seminar';
    
    protected $fillable = [
        'item_seminar_id',
        'pembicara',
        'lokasi',
        'kuota_peserta',
        'kategori',
        'level',
        'fasilitas',
        'kontak_person'
    ];

    // Relasi belongsTo ke ItemSeminar
    public function itemSeminar()
    {
        return $this->belongsTo(ItemSeminar::class, 'item_seminar_id');
    }
}