<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferDetail extends Model
{
    use HasFactory;
    protected $fillable = ['transfer_id', 'deskripsi', 'benefit'];
    
    // Detail belongs to satu transfer
    public function transfer()
    {
        return $this->belongsTo(Transfer::class);
    }
}