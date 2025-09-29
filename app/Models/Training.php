<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Training extends Model
{
    /**
     * The attributes that are mass assignable.
     * Ini untuk keamanan mass assignment
     */
    protected $fillable = [
        'judul',
        'deskripsi', 
        'tanggal',
        'harga',
        'gambar'
    ];

    /**
     * The attributes that should be cast.
     * Ini untuk mengubah tipe data
     */
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
}