<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;

class OrderController extends Controller
{
    public function create(Request $request)
    {

        // if ($cart->items->isEmpty()) {
        //     return redirect()->route('cart.')->with('error', 'Your cart is empty!');
        // }
        $cart = session('cart', []);

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
    

        $order = Order::create([
            'total_price' => $total,
            'shipping_address' => $request->shipping_address,
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'quantity' => $item['quantity'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('order.confirmation', $order->id);
    }

    /**
     * Show the order confirmation page.
     *
     * @param  int  $orderId
     * @return \Illuminate\Http\Response
     */
    public function orderConfirmation($orderId)
    {
        $order = Order::find($orderId);

        if (!$order) {
            return redirect()->route('/')->with('error', 'Order not found.');
        }

        return view('orders.confirmation', compact('order'));
    }
}
