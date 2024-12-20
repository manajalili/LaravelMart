<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        "shipping_address",
        "total_price"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems() {
        return $this->hasMany(OrderItem::class, "order_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
