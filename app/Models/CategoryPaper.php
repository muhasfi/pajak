<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPaper extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // 1 kategori bisa punya banyak paper
    public function papers()
    {
        return $this->hasMany(ItemPaper::class);
    }
    
}
