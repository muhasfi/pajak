<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananPembuatanPt extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'deskripsi', 'harga'];

    public function detailLayanans()
    {
        return $this->hasMany(DetailLayanan::class);
    }
}
