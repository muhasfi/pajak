<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_id', 'materi', 'instruktur', 'durasi_jam', 
        'tempat', 'kuota_peserta', 'peralatan_dibutuhkan'
    ];

    /**
     * Get the training that owns the detail
     */
    public function training(): BelongsTo
    {
        return $this->belongsTo(Training::class);
    }
}