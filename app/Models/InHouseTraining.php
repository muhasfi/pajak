<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InHouseTraining extends Model
{
    use HasFactory;

    protected $table = 'in_house_trainings';

    protected $fillable = [
        'gambar',
        'judul',
        'deskripsi',
        'tanggal',
        'harga',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
