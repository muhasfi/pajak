<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPajakDetail extends Model
{
    use HasFactory;

    protected $table = 'item_pajak_details';
    protected $fillable = ['pajak_id', 'deskripsi', 'benefit','file_path'];

    protected $casts = [
        'benefit' => 'array',
    ];

    public function pajak()
    {
        return $this->belongsTo(ItemPajak::class, 'pajak_id');
    }
}
