<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTraining extends Model
{
    use HasFactory;

    protected $table = 'item_trainings';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'harga',
        'gambar',
    ];

    /**
     * Relasi ke detail training (One to One)
     */
    public function detail()
    {
        return $this->hasOne(ItemTrainingDetail::class, 'training_id');
    }

}
