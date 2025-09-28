<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Artikel extends Model
{
    use HasFactory; // 🚀 hapus SoftDeletes

    protected $table = 'artikels';

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'thumbnail',
        'status',
        'publish_date',
        'publish_time'
    ];

    // auto generate slug dari title
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title, '-');
            }
        });

        static::updating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title, '-');
            }
        });
    }
}
