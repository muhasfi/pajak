<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemSeminarDetail extends Model
{
    use HasFactory;
    protected $table = "item_seminar_details";

    protected $fillable = [
        'item_seminar_id',
        'pembicara',
        'lokasi',
        'kuota_peserta',
        'kategori',
        'level',
        'fasilitas',
        'kontak_person',
    ];

    public function itemSeminar()
    {
        return $this->belongsTo(ItemSeminar::class, 'item_seminar_id');
    }
}
