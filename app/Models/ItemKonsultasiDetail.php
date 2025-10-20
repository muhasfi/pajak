<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemKonsultasiDetail extends Model
{
    use HasFactory;

    protected $fillable = ['item_konsultasi_id', 'waktu_menit','deskripsi', 'benefit', 'file_path'];

    protected $casts = [
        'benefit' => 'array',
    ];

    public function konsultasi()
    {
        return $this->belongsTo(ItemKonsultasi::class, 'item_konsultasi_id');
    }
}
