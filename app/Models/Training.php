<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Training extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi', 
        'tanggal',
        'harga',
        'gambar',
        'type',
        'status'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'harga' => 'decimal:2'
    ];

    /**
     * Get the detail associated with the training
     */
    public function detail(): HasOne
    {
        return $this->hasOne(TrainingDetail::class);
    }

    // Accessor for image URL
    public function getImageUrlAttribute()
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        }
        return null;
    }
}