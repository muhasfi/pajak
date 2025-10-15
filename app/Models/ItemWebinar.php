<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemWebinar extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'deskripsi', 'tanggal', 'harga', 'gambar'
    ];
     protected $casts = [
        'tanggal' => 'datetime',
        // Add other date attributes here if needed
    ];

    public function details()
    {
        return $this->hasMany(ItemWebinarDetail::class);
    }
}
