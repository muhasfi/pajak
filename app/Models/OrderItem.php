<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes, HasFactory;

    // protected $fillable = ['order_id', 'quantity', 'price', 'tax','total_price', 'created_at', 'updated_at'];
    protected $fillable = ['order_id', 'product_id', 'product_type', 'quantity', 'price', 'tax','total_price'];

    protected $dates = ['deleted_at'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // public function item()
    // {
    //     return $this->belongsTo(Item::class);
    // }

    public function product()
    {
        return $this->morphTo(__FUNCTION__, 'product_type', 'product_id');
    }

    protected $appends = ['product_type'];

    public function getProductCategoryAttribute()
    {
        if ($this->product instanceof \App\Models\Item) {
            return 'Book';
        } elseif ($this->product instanceof \App\Models\ItemBimbel) {
            return 'Bimbel';
        }
        return 'Unknown';
    }
}
