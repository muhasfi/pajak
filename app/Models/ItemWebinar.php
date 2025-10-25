<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemWebinar extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'judul',
        'deskripsi',
        'tanggal',
        'waktu_pelaksanaan',
        'harga',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'waktu_pelaksanaan' => 'datetime', // ditambahkan
        'harga' => 'decimal:2'
    ];

    public function detail()
    {
        return $this->hasOne(ItemWebinarDetail::class, 'item_webinar_id');
    }
}
