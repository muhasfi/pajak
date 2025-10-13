<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemBook extends Model
{
    use HasFactory;

    protected $table = 'item_books';

    protected $fillable = [
        'nama',
        'deskripsi',
        'price',
        'img',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'decimal:2'
    ];
}