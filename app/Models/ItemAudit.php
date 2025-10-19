<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemAudit extends Model
{
    use HasFactory;

    protected $table = 'item_audits'; // pastikan sesuai nama tabel
    protected $fillable = ['judul', 'harga'];

    /**
     * Relasi ke detail audit
     */
    public function detail()
    {
        return $this->hasOne(ItemAuditDetail::class, 'audit_id');
    }
}
