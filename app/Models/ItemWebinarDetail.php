<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemWebinarDetail extends Model
{
    use HasFactory;
    protected $table = 'item_webinar_details';

    protected $fillable = [
        'item_webinar_id',
        'pembicara',
        'lokasi',
        'kuota_peserta',
        'kategori',
        'level',
        'fasilitas',
        'kontak_person',
        'file_path',
    ];

    public function itemWebinar()
    {
        return $this->belongsTo(ItemWebinar::class, 'item_webinar_id');
    }
}
