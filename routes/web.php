<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;


Route::middleware('auth')->group(function () {
    Route::get('/checkout', function () {
        return view('orders.checkout');
    })->name('checkout');

    Route::post('/orders', [OrderController::class, 'create'])->name('order.create');
    Route::get('/orders/{order}', [OrderController::class, 'orderConfirmation'])->name('order.confirmation');
});


Route::get('/', [ProductController::class, 'index'])->name('product.index');

Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'view'])->name('cart.review');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
