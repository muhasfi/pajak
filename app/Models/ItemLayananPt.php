<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ItemLayananPt extends Model
{
    use HasFactory;

    protected $table = 'item_layanan_pts'; // Now it won't look for 'layanan_pts'
    protected $fillable = ['judul', 'harga'];
    public function detail(): HasOne
    {
        return $this->hasOne(ItemLayananPtDetail::class, 'layanan_id');
    }
}
