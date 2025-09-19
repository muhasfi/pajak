<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemBimbel extends Model
{
    use HasFactory;

    protected $table = 'item_bimbel';

    protected $fillable = [
        'judul',
        'deskripsi',
        'materi_pdf',
        'video',
        'harga',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'harga' => 'decimal:2'
    ];
}