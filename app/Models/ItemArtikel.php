<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemArtikel extends Model
{
    use HasFactory;

    protected $table = 'item_artikels';

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'img',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'harga' => 'decimal:2'
    ];
}