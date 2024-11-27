@extends('welcome')

@section('content')
    <div>
        <h1 class="mt-4 mb-4"><strong>All Products</strong></h1>
        <div class="cart-button">
            <a href="{{ route('cart.review') }}" class="btn btn-success" style="position: fixed; top: 20px; right: 16px; z-index: 1000;">
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
                        <p class="card-text mb-3"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>

                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-dark">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection