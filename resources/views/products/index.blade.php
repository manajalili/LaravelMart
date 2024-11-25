@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h2>Products</h2>
            <div class="cart-button">
                <a href="{{ route('cart.review') }}" class="btn btn-primary" style="position: fixed; top: 20px; right: 16px; z-index: 1000;">
                    <i class="fas fa-shopping-cart" style="font-size: 16px;"></i> Cart
                    <span id="cart-item-count" class="badge badge-pill badge-danger" style="margin-left: 5px;">
                        {{ count(session('cart', [])) }}
                    </span>
                </a>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 border">
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $product->name }}</strong></h5>
                            <p class="card-text">{{ $product->info }}</p>
                            <p class="card-text"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>

                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection