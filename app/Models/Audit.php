<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Audit extends Model
{
    protected $fillable = ['judul', 'harga'];
    public function auditDetails(): HasMany
    {
        return $this->hasMany(AuditDetail::class);
    }
}