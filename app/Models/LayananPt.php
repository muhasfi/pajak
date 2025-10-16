<?php

// app/Models/LayananPt.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LayananPt extends Model
{
    protected $fillable = ['judul', 'harga'];
    protected $table = 'layanan_pt'; // Now it won't look for 'layanan_pts'
    public function detail(): HasOne
    {
        return $this->hasOne(LayananPtDetail::class);
    }
}