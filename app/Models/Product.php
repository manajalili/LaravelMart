<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        "name",
        "info",
        "price",
        "image",
    ];

    /**
     * @var array
     */
    protected $casts = [
        'price' => 'integer',
    ];
}
