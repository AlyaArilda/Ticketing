<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'transaction_time',
        'total_price',
        'total_item',
        'payment_amount',
        'cashier_id',
        'cashier_name',
        'payment_method'
    ];

    public function OrderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function Cashier(){
        return $this->belongsTo(User::class,'cashier_id');
    }
}
