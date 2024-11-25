@extends('layouts.app')

@section('content')
    <h1>Order Confirmation</h1>

    <p>Order ID: {{ $order->id }}</p>
    <p>Shipping Address: {{ $order->shipping_address }}</p>
    <p>Total Price: ${{ $order->total_price }}</p>

    <h3>Order Items:</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>${{ $item->product->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ $item->product->price * $item->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
