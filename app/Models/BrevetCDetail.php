<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrevetCDetail extends Model
{
    use HasFactory;

    protected $table = 'item_brevetc_detail';

    protected $fillable = [
        'brevet_c_id',
        'fasilitas',
        'keterangan',
        'urutan',
    ];

    public function brevetC()
    {
        return $this->belongsTo(BrevetC::class, 'brevet_c_id');
    }
}
