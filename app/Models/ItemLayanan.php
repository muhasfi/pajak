<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemLayanan extends Model
{
    use HasFactory;

    protected $table = 'item_layanan';

    protected $fillable = [
        'judul',
        'deskripsi',
        'harga',
        'is_active',
    ];
}
