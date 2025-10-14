<?php

// app/Models/LayananPtDetail.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LayananPtDetail extends Model
{
    protected $fillable = ['layanan_pt_id', 'deskripsi', 'benefit'];
    protected $casts = ['benefit' => 'array']; // Cast kolom benefit sebagai array
    
    public function layananPt(): BelongsTo
    {
        return $this->belongsTo(LayananPt::class);
    }
}