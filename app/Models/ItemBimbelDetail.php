<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemBimbelDetail extends Model
{
    use HasFactory;

    protected $table = 'item_bimbel_details'; // nama tabel

    protected $fillable = [
        'item_bimbel_id',
        'judul',
        'deskripsi',
        'materi_pdf',
        'video',
        'urutan',
        'is_active',
    ];

    /**
     * Relasi ke master bimbel (Many to One)
     */
    public function itemBimbel()
    {
        return $this->belongsTo(ItemBimbel::class, 'item_bimbel_id');
    }
}
