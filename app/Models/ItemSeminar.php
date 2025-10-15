<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemSeminar extends Model
{
    use HasFactory;

    protected $table = "item_seminars";

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

    public function detailSeminar()
    {
        return $this->hasOne(ItemSeminarDetail::class, 'item_seminar_id');
    }
}
