<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPajak extends Model
{
    use HasFactory;
    protected $table = 'item_pajaks';
    protected $fillable = ['judul', 'harga'];

    public function detail()
    {
        return $this->hasOne(ItemPajakDetail::class, 'pajak_id');
    }
}
