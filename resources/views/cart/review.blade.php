@extends('layouts.app')

@section('content')

    <h1>Your Shopping Cart</h1>

    @if(isset($message))
        <p>{{ $message }}</p>
    @endif

    @if(!empty($cart))
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p><strong>Total:</strong> ${{ number_format(array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart)), 2) }}</p>

        <a href="{{ route('cart.clear') }}" class="btn btn-danger">Clear Cart</a>
    @else
        <p>Your cart is empty.</p>
    @endif

@endsection