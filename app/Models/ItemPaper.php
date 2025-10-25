<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemPaper extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name', 'description', 'price', 'img', 'is_active', 'category_id', 'kebutuhan'
    ];

    // Relasi ke kategori (1 kategori per paper)
    public function categoryPaper()
    {
        return $this->belongsTo(CategoryPaper::class, 'category_id');
    }

    // Relasi ke detail (1 detail per paper)
    public function detail()
    {
        return $this->hasOne(ItemPaperDetail::class, 'paper_id');
    }
}


