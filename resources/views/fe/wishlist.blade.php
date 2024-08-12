@extends('layouts.fe.index')

@section('content')

    <!-- PRODUCT -->
    <div class="product-container">
        <div class="container">
            <!-- PRODUCT -->
            <div class="product-box">
                <!-- PRODUCT GRID -->
                <div class="product-main">
                    <h2 class="title">Your Wishlist</h2>
                    <div class="product-grid">
                        @forelse ($wishlist as $item)
                            <div class="showcase">
                                <div class="showcase-banner">
                                    <img src="{{ asset('images/product').'/'.$item->product->thumbnail }}" alt="{{ $item->product->name }}" width="300" class="product-img">
                                    <div class="showcase-actions">
                                        <button class="btn-action" onclick="event.preventDefault(); document.getElementById('wishlist-form-{{ $item->product->id }}').submit();">
                                            <ion-icon name="heart-dislike-outline"></ion-icon>
                                        </button>
                                        <button class="btn-action" onclick="event.preventDefault(); document.getElementById('cart-form-{{ $item->product->id }}').submit();">
                                            <ion-icon name="bag-add-outline"></ion-icon>
                                        </button>
                                        <button class="btn-action" onclick="location.href='{{ route('fe.product_detail', $item->product->id) }}';">
                                            <ion-icon name="eye-outline"></ion-icon>
                                        </button>
                                    </div>
                                </div>
                                <div class="showcase-content">
                                    <a href="{{ route('fe.product_detail', $item->product->id) }}" class="showcase-category">{{ $item->product->category->name }}</a>
                                    <a href="{{ route('fe.product_detail', $item->product->id) }}">
                                        <h3 class="showcase-title">{{ $item->product->name }}</h3>
                                    </a>
                                    <div class="price-box">
                                        <p class="price">{{ __('Rp.').number_format($item->product->price,2,',','.') }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Wishlist -->
                            <form id="wishlist-form-{{ $item->product->id }}" action="{{ route('fe.wishlistIgnore') }}" method="POST" class="d-none">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                            </form>
                            <!-- Wishlist -->

                            <!-- Cart -->
                            <form id="cart-form-{{ $item->product->id }}" action="{{ route('fe.cartAdd') }}" method="POST" class="d-none">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                            </form>
                            <!-- Cart -->
                        @empty
                            <div class="text-center">
                                <h2>DATA NOT FOUND OR EMPTY!</h2>
                            </div>
                        @endforelse
                    </div>
                </div>
                <!-- PRODUCT GRID -->
            </div>
            <!-- PRODUCT -->
        </div>
    </div>
    <!-- PRODUCT -->

@endsection
