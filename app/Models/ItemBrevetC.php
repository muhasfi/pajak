<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemBrevetC extends Model
{
    use HasFactory;
    
    protected $table = 'item_brevetc';

    protected $fillable = [
        'gambar',
        'judul',
        'deskripsi',
        'hari',
        'lokasi',
        'tanggal_mulai',
        'tanggal_selesai',
        'waktu_pelaksanaan',
        'harga',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'waktu_pelaksanaan' => 'datetime:H:i',
    ];

    public function details()
    {
        return $this->hasMany(ItemBrevetCDetail::class, 'brevet_c_id');
    }
}
