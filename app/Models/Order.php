<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        "shipping_address",
    ];

    /**
     * @var array
     */
    protected $casts = [
        'total_price' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems() {
        return $this->hasMany(OrderItem::class, "order_id");
    }
}
