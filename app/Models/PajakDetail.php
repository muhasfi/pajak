<?php
// app/Models/PajakDetail.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PajakDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'pajak_id',
        'deskripsi',
        'benefit',
    ];

    protected $casts = [
        'benefit' => 'array',
    ];

    public function pajak()
    {
        return $this->belongsTo(Pajak::class);
    }
}