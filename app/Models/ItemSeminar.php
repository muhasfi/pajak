<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemSeminar extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'item_seminars';

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'img',
        'is_active'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'is_active' => 'boolean'
    ];
}