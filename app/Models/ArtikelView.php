<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelView extends Model
{
    use HasFactory;
    protected $table = 'artikel_views';

    protected $fillable = [
        'artikel_id',
        'ip_address',
    ];

    public function artikel()
    {
        return $this->belongsTo(Artikel::class);
    }
}
