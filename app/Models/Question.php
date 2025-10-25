<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'guest_name', 
        'guest_email', 
        'title', 
        'content', 
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Scope untuk pertanyaan yang approved
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    // Scope untuk pertanyaan pending (butuh approval admin)
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    // Method untuk mengecek apakah pertanyaan dari guest
    public function isFromGuest()
    {
        return is_null($this->user_id);
    }

    // Method untuk mendapatkan nama penanya (FIXED)
    public function getAskerName()
    {
        if ($this->isFromGuest()) {
            return $this->guest_name ?? 'Anonymous';
        }
        
        // Pastikan user relationship ada sebelum mengakses property
        return $this->user ? $this->user->name : 'Unknown User';
    }

    // Method untuk mendapatkan email penanya (FIXED)
    public function getAskerEmail()
    {
        if ($this->isFromGuest()) {
            return $this->guest_email ?? 'No Email';
        }
        
        // Pastikan user relationship ada sebelum mengakses property
        return $this->user ? $this->user->email : 'No Email';
    }

    // Method untuk mendapatkan avatar atau inisial (optional)
    public function getAskerInitial()
    {
        $name = $this->getAskerName();
        return strtoupper(substr($name, 0, 1));
    }

    // Method untuk menampilkan status badge
    public function getStatusBadge()
    {
        switch ($this->status) {
            case 'approved':
                return '<span class="badge bg-success">Disetujui</span>';
            case 'pending':
                return '<span class="badge bg-warning">Menunggu</span>';
            case 'rejected':
                return '<span class="badge bg-danger">Ditolak</span>';
            default:
                return '<span class="badge bg-secondary">Unknown</span>';
        }
    }
}