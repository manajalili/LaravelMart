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
                    <td>{{ optional($item->product)->name ?? 'Product Not Found' }}</td>
                    <td>${{ optional($item->product)->price ?? 0 }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ optional($item->product)->price * $item->quantity ?? 0 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('product.index') }}" class="mt-3 btn btn-success">Continue Shopping</a>
@endsection
