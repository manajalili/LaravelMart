<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Add product to the session cart
    public function add(Product $product)
    {
        // Retrieve the current cart from session or initialize an empty cart if none exists
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'info' => $product->info,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.review');
    }

    public function view()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return view('cart.review', ['message' => 'Your cart is empty.']);
        }

        // Return the cart view with cart data
        return view('cart.review', ['cart' => $cart]);
    }

    public function remove($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.review');
    }

    public function clear()
    {
        session()->forget('cart');

        return redirect()->route('cart.review');
    }

    public function update(Request $request, $productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $quantity = $request->input('quantity');
            if ($quantity > 0) {
                $cart[$productId]['quantity'] = $quantity;
            } else {
                unset($cart[$productId]);
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.review');
    }
}
