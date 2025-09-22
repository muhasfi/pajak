<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemSeminar extends Model
{
    use HasFactory;

    protected $table = 'item_seminar';

    protected $fillable = [
        'nama', 'deskripsi', 'harga', 'img', 'is_active', 'tanggal'
    ];
}
