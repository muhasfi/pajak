<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetail extends Model
{
    use HasFactory;

    protected $table = 'item_details';

    protected $fillable = [
        'item_id',
        'file_path',
        'video_url',
        'zoom_link',
        'event_date',
        'duration_days',
    ];

    /**
     * Relasi ke Item
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
