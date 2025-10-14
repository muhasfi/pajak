<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Litigasi extends Model
{
    use HasFactory;

    protected $table = 'litigasi';
    
    protected $fillable = [
        'judul', 
        'harga'
    ];

    public function details()
    {
        return $this->hasMany(LitigasiDetail::class);
    }
}