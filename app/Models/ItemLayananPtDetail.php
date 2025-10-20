<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemLayananPtDetail extends Model
{
    use HasFactory;

    protected $fillable = ['layanan_pt_id', 'deskripsi', 'paket', 'benefit', 'file_path'];
    protected $casts = ['benefit' => 'array']; // Cast kolom benefit sebagai array
    
    public function layananPt(): BelongsTo
    {
        return $this->belongsTo(ItemLayananPt::class, 'layanan_id');
    }
}