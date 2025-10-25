<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Artikel extends Model
{
    use HasFactory, SoftDeletes;

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

    protected $casts = [
    'publish_date' => 'datetime',
];



    public function views()
    {
        return $this->hasMany(ArtikelView::class);
    }

    // auto generate slug dari title
    public static function boot()
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
