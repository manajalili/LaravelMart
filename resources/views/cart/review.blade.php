@extends('welcome')

@section('content')
<div class="row d-flex justify-content-center mt-5 p-5 border">
    <div class="col-6">
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

            <a href="{{ route('cart.clear') }}" class="mt-3 btn btn-light border">Clear Cart</a>
            <a href="{{ route('product.index') }}" class="mt-3 btn btn-success">Continue Shopping</a>
            <form action="{{ route('checkout') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-dark mt-3">Checkout</button>
            </form>
        @else
            <p>Your cart is empty.</p>
            <a href="{{ route('product.index') }}" class="mt-3 btn btn-success">Continue Shopping</a>
        @endif
        </div>
    </div>
@endsection