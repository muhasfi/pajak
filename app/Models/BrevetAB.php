<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrevetAB extends Model
{
    protected $table = 'item_brevetab';

    protected $fillable = [
        'gambar', 'judul', 'deskripsi', 'hari',
        'tanggal_mulai', 'tanggal_selesai', 'harga',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function detail()
    {
        return $this->hasOne(BrevetABDetail::class, 'brevetab_id');
    }
}
