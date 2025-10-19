<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemLitigasi extends Model
{
    use HasFactory;

    protected $table = 'item_litigasis';

    protected $fillable = ['judul', 'harga'];

    public function detail()
    {
        return $this->hasOne(ItemLitigasiDetail::class, 'litigasi_id');
    }
}
