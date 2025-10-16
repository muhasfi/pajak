<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['category_id', 'judul', 'deskripsi', 'harga', 'gambar'];

    // Pastikan ada ini 👇
    protected $casts = [
        'deskripsi' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

