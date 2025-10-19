<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTransferDetail extends Model
{
    use HasFactory;

    protected $table = 'item_transfer_details';
    protected $fillable = [
        'item_transfer_id',
        'deskripsi',
        'benefit',
    ];

    protected $casts = [
        'benefit' => 'array',
    ];

    public function itemTransfer()
    {
        return $this->belongsTo(ItemTransfer::class);
    }
}
