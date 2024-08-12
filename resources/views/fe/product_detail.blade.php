@extends('layouts.fe.index')

@section('content')

    <!-- PRODUCT -->
    <div class="container">
        <div class="card border-0">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('images/product').'/'.$product->thumbnail }}" class="img-fluid rounded-start" alt="{{ $product->name }}">
                </div>
                <div class="col-md-7 mx-5">
                    <div class="card-body">
                        <a class="card-text mb-2" style="color:hsl(353, 100%, 78%);" href="category.html">{{ $product->category->name }}</a>
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">
                            {!! $product->body !!}
                        </p>
                        <p class="card-text">{{ __('Rp.').number_format($product->price,2,',','.') }}</p>
                        <div class="row">
                            <div class="col-md-1 col-sm-3">
                                <button class="btn btn-xl btn-outline-danger btn-action" onclick="event.preventDefault(); document.getElementById('wishlist-form-{{ $product->id }}').submit();">
                                    <ion-icon name="heart-outline"></ion-icon>
                                </button>
                            </div>
                            <div class="col-md-1 col-sm-3">
                                <button class="btn btn-xl btn-outline-info btn-action" onclick="event.preventDefault(); document.getElementById('cart-form-{{ $product->id }}').submit();">
                                    <ion-icon name="bag-add-outline"></ion-icon>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wishlist -->
        <form id="wishlist-form-{{ $product->id }}" action="{{ route('fe.wishlistAdd') }}" method="POST" class="d-none">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
        </form>
        <!-- Wishlist -->

        <!-- Cart -->
        <form id="cart-form-{{ $product->id }}" action="{{ route('fe.cartAdd') }}" method="POST" class="d-none">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
        </form>
        <!-- Cart -->
    </div>
    <!-- PRODUCT -->

@endsection
