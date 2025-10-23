<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemBrevetCDetail extends Model
{
    use HasFactory;

    protected $table = 'item_brevetc_details';

   protected $fillable = [
        'brevetcs_id', 'fasilitas', 'deskripsi_fasilitas',
        'durasi_jam', 'instruktur', 'lokasi', 'kuota_peserta',
        'level', 'syarat_peserta', 'materi_pelatihan','file_path',
    ];

    public function brevetc()
    {
        return $this->belongsTo(ItemBrevetC::class, 'brevetcs_id');
    }
}
