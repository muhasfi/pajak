<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemBrevetABDetail extends Model
{
    protected $table = 'item_brevetab_detail';

    protected $fillable = [
        'brevetab_id', 'fasilitas', 'deskripsi_fasilitas',
        'durasi_jam', 'instruktur', 'lokasi', 'kuota_peserta',
        'level', 'syarat_peserta', 'materi_pelatihan','file_path',
    ];

    public function brevetab()
    {
        return $this->belongsTo(ItemBrevetAB::class, 'brevetab_id');
    }
}
