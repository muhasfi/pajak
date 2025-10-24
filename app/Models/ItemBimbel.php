<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemBimbel extends Model
{
    use HasFactory;

    protected $table = 'item_bimbels';

    protected $fillable = [
        'judul',
        'harga',
        'deskripsi',
        'gambar',
        'status',
    ];

    // Relasi ke detail
    public function details()
    {
        return $this->hasMany(ItemBimbelDetail::class, 'id_item_bimbels');
    }
}
