<?php
// app/Models/DetailBrevetC.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBrevetC extends Model
{
    use HasFactory;

    protected $table = 'detail_brevet_c';
    
    protected $fillable = [
        'brevet_c_id',
        'fasilitas',
        'keterangan',
        'urutan'
    ];

    // Relasi ke brevet C
    public function brevetC()
    {
        return $this->belongsTo(BrevetC::class, 'brevet_c_id');
    }
}