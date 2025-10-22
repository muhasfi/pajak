<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemAuditDetail extends Model
{
    use HasFactory;

    protected $table = 'item_audit_details';
    protected $fillable = ['audit_id', 'deskripsi', 'benefit','file_path'];

    /**
     * Konversi kolom JSON ke array otomatis
     */
    protected $casts = [
        'benefit' => 'array',
    ];

    /**
     * Relasi ke induk audit
     */
    public function audit()
    {
        return $this->belongsTo(ItemAudit::class, 'audit_id');
    }
}
