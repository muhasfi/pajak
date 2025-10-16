<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailLayanan extends Model
{
    use HasFactory;
    protected $fillable = ['layanan_pembuatan_pt_id', 'nama_langkah', 'keterangan', 'estimasi_hari'];

    public function layananPembuatanPt()
    {
        return $this->belongsTo(LayananPembuatanPt::class);
    }
}
