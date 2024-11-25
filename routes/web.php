<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;

Route::get('/', [ProductController::class, 'index']);

Route::resources([
    'product' => ProductController::class,
    'order' => OrderController::class,
    'order_item' => OrderItemController::class,
]);
