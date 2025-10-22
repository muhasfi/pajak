<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTrainingDetail extends Model
{
    use HasFactory;

    protected $table = 'item_training_details';

    protected $fillable = [
        'training_id',
        'materi',
        'instruktur',
        'durasi_jam',
        'tempat',
        'kuota_peserta',
        'peralatan_dibutuhkan',
        'file_path'
    ];

    /**
     * Relasi ke training utama
     */
    public function training()
    {
        return $this->belongsTo(ItemTraining::class, 'training_id');
    }
}
