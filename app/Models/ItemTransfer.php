<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTransfer extends Model
{
    use HasFactory;
    protected $table = 'item_transfers';

    protected $fillable = [
        'judul',
        'harga',
    ];

    public function detail()
    {
        return $this->hasOne(ItemTransferDetail::class);
    }
}
