<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemBrevetC extends Model
{
    use HasFactory;
    
    protected $table = 'item_brevetcs';

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
        return $this->hasOne(ItemBrevetCDetail::class, 'brevetcs_id');
    }
}
