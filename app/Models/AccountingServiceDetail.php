<?php
// app/Models/AccountingServiceDetail.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountingServiceDetail extends Model
{
    use HasFactory;

    protected $fillable = ['accounting_service_id', 'deskripsi', 'benefit'];

    protected $casts = [
        'benefit' => 'array'
    ];

    public function service()
    {
        return $this->belongsTo(AccountingService::class, 'accounting_service_id');
    }
}