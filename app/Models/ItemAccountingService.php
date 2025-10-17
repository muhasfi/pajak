<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemAccountingService extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'harga'];

    public function details()
    {
        return $this->hasOne(ItemAccountingServiceDetail::class, 'accounting_service_id');
    }
}
