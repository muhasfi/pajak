<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemWebinarDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_webinar_id', 'pembicara', 'topik', 'waktu_mulai', 'waktu_selesai', 'materi'
    ];

    public function webinar()
    {
        return $this->belongsTo(ItemWebinar::class);
    }
}
