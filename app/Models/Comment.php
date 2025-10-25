<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'content', 'approved'];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
