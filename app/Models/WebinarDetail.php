<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebinarDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'webinar_id',
        'pembicara',
        'topik',
        'waktu_mulai',
        'waktu_selesai',
        'materi'
    ];

    // Relasi many-to-one: banyak detail dimiliki satu webinar
    public function webinar()
    {
        return $this->belongsTo(Webinar::class);
    }
}