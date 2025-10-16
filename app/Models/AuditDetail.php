<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class AuditDetail extends Model
{
    protected $fillable = ['audit_id', 'deskripsi', 'benefit'];
    public function audit(): BelongsTo
    {
        return $this->belongsTo(Audit::class);
    }
}