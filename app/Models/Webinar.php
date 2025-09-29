<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'judul',
        'deskripsi',
        'tanggal',
        'harga'
    ];

    // Relasi one-to-many: satu webinar memiliki banyak detail
    public function details()
    {
        return $this->hasMany(WebinarDetail::class);
    }
}