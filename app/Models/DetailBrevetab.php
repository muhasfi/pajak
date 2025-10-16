<?php
// app/Models/DetailBrevetab.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBrevetab extends Model
{
    use HasFactory;

    protected $table = 'detail_brevetab';
    
    protected $fillable = [
        'brevetab_id',
        'fasilitas',
        'deskripsi_fasilitas',
        'durasi_jam',
        'instruktur',
        'lokasi',
        'kuota_peserta',
        'level',
        'syarat_peserta',
        'materi_pelatihan'
    ];

    public function brevetab()
    {
        return $this->belongsTo(BrevetAB::class, 'brevetab_id');
    }
}