<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\CartController;

Route::get('/', [ProductController::class, 'index']);

Route::resources([
    'product' => ProductController::class,
    'order' => OrderController::class,
    'order_item' => OrderItemController::class,
]);

Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'view'])->name('cart.review');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/orders', [OrderController::class, 'create'])->name('order.create');
Route::get('/orders/{order}', [OrderController::class, 'orderConfirmation'])->name('order.confirmation');
