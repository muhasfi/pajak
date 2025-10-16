<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LitigasiDetail extends Model
{
    use HasFactory;

    protected $table = 'litigasi_detail';
    
    protected $fillable = [
        'litigasi_id',
        'deskripsi',
        'benefit'
    ];

    protected $casts = [
        'benefit' => 'array'
    ];

    public function litigasi()
    {
        return $this->belongsTo(Litigasi::class);
    }
}