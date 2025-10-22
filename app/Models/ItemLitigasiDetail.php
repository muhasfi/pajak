<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemLitigasiDetail extends Model
{
    use HasFactory;

    protected $table = 'item_litigasi_details';

    protected $fillable = ['litigasi_id', 'deskripsi', 'benefit', 'file_path'];

    protected $casts = [
        'benefit' => 'array',
    ];

    public function litigasi()
    {
        return $this->belongsTo(ItemLitigasi::class, 'litigasi_id');
    }
}
