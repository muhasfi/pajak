<?php
// app/Models/Pajak.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'harga',
    ];

    public function detail()
    {
        return $this->hasOne(PajakDetail::class);
    }
}