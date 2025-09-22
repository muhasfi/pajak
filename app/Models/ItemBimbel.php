<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemBimbel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'item_bimbels'; // nama tabel

    protected $fillable = [
        'judul',
        'deskripsi',
        'harga',
        'is_active',
    ];

    /**
     * Relasi ke detail (One to Many)
     */
    public function details()
    {
        return $this->hasMany(ItemBimbelDetail::class, 'item_bimbel_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($item) {
            $item->details()->delete();
        });
    }
}
