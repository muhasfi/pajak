<?php
// app/Models/AccountingService.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountingService extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'harga'];

    public function details()
    {
        return $this->hasOne(AccountingServiceDetail::class);
    }
}