<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemBimbelDetail extends Model
{
    use HasFactory;

    protected $table = 'item_bimbel_details';

    protected $fillable = [
        'id_item_bimbels',
        'judul_materi',
        'deskripsi',
        'link',
        'urutan',
    ];

    // Relasi ke bimbel utama
    public function bimbel()
    {
        return $this->belongsTo(ItemBimbel::class, 'id_item_bimbels');
    }
}
