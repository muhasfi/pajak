<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemPaperDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'paper_id',
        'file_path',
    ];

    // Relasi ke paper (1 detail milik 1 paper)
    public function paper()
    {
        return $this->belongsTo(ItemPaper::class, 'paper_id');
    }
}
