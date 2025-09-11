<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['order_code','user_id','subtotal','tax', 'grand_total', 'status', 'note', 'created_at', 'updated_at', 'payment_method'];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function setStatusPending()
    {
        $this->status = 'pending';
        $this->save();
    }

    public function setStatusSuccess()
    {
        $this->status = 'success';
        $this->save();
    }

    public function setStatusFailed()
    {
        $this->status = 'failed';
        $this->save();
    }

    public function setStatusExpired()
    {
        $this->status = 'expired';
        $this->save();
    }
}
