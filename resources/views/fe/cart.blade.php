@extends('layouts.fe.index')

@section('content')

    <?php
        $total_price = \Setting::getTotalPrice() + $ongkir
    ?>

    <!-- CHECKOUT -->
    <div class="container mb-5">
        <div class="card border-0" action="" method="post">
            <div class="card-body">
                <h2 class="title">#Detail Cart</h2>
                <table class="table mb-4">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Name</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cart as $item)
                            <tr>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Action">
                                        <button type="button" class="btn btn-outline-primary btn-action" onclick="event.preventDefault(); document.getElementById('cartAdd-form-{{ $item->product->id }}').submit();">
                                            <ion-icon name="bag-add-outline"></ion-icon>
                                        </button>
                                        <button type="button" class="btn btn-outline-warning btn-action" onclick="event.preventDefault(); document.getElementById('cartMin-form-{{ $item->product->id }}').submit();">
                                            <ion-icon name="bag-remove-outline"></ion-icon>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger btn-action" onclick="event.preventDefault(); document.getElementById('cartIgnore-form-{{ $item->product->id }}').submit();">
                                            <ion-icon name="trash-bin-outline"></ion-icon>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <img src="{{ asset('images/product').'/'.$item->product->thumbnail }}" alt="{{ $item->product->name }}" width="50" class="product-img">
                                </td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ __('Rp.').number_format($item->product->price,2,',','.') }}</td>
                                <td>{{ __('Rp.').number_format($item->product->price*$item->qty,2,',','.') }}</td>
                            </tr>

                            <form action="" method="get" class="d-none"></form>
                            <!-- Cart Add -->
                            <form id="cartAdd-form-{{ $item->product->id }}" action="{{ route('fe.cartAdd') }}" method="POST" class="d-none">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                            </form>
                            <!-- Cart Add -->

                            <!-- Cart Minus -->
                            <form id="cartMin-form-{{ $item->product->id }}" action="{{ route('fe.cartMin') }}" method="POST" class="d-none">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                            </form>
                            <!-- Cart Minus -->

                            <!-- Cart Ignore -->
                            <form id="cartIgnore-form-{{ $item->product->id }}" action="{{ route('fe.cartIgnore') }}" method="POST" class="d-none">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                            </form>
                            <!-- Cart Ignore -->
                        @empty
                            <tr>
                                <th class="text-center" colspan="6">DATA NOT FOUND OR EMPTY!</th>
                            </tr>
                        @endforelse
                            <tr>
                                <th class="text-left" colspan="5">Total Harga</th>
                                <th class="text-right">{{ __('Rp.').number_format(\Setting::getTotalPrice(),2,',','.') }}</th>
                            </tr>
                            <tr>
                                <th class="text-left" colspan="5">Ongkos Kirim</th>
                                <th class="text-right">{{ __('Rp.').number_format($ongkir,2,',','.') }}</th>
                            </tr>
                            <tr>
                                <th class="text-left" colspan="5">Total Harga + Ongkos Kirim</th>
                                <th class="text-right">{{ __('Rp.').number_format($total_price,2,',','.') }}</th>
                            </tr>
                    </tbody>
                </table>
            </div>
            <form class="card-body" action="{{ route('fe.checkout') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="title">#Detail Bank</h2>
                <div class="row mb-4">
                    <div class="col-md-6 mb-4">
                        <img src="{{ asset('images') }}/bank/Logo-BNI.webp" alt="payment method" class="payment-img">
                        <label for="bni" class="form-label">Bank BNI</label>
                        <input type="text" class="form-control" id="bni" name="bni" value="123456789" disabled>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('images') }}/bank/Logo-BCA.webp" alt="payment method" class="payment-img">
                        <label for="bca" class="form-label">Bank BCA</label>
                        <input type="text" class="form-control" id="bca" name="bca" value="123456789" disabled>
                    </div>
                </div>
                <h2 class="title">#Detail Checkout</h2>
                <div class="row mb-4">
                    <div class="col-md-6 mb-4">
                        <label for="address" class="form-label">Alamat Tujuan</label>
                        <textarea name="address" id="address" rows="5" class="form-control" required>Jl. Kapuk Pulo No. 27, RT. 07 / RW. 10, Kapuk, Cengkareng, RT.7, Kapuk, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11720</textarea>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="note" class="form-label">Catatan</label>
                        <textarea name="note" id="note" rows="5" class="form-control" required></textarea>
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="name" class="form-label">Nama Akun/Pembeli</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" disabled>
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="phone" class="form-label">Nomer WhatsApp</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ Str::startsWith(Auth::user()->phone, '0') ? '+62' . substr(Auth::user()->phone, 1) : '+62' . Auth::user()->phone }}" disabled>
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="tf" class="form-label">Bukti Transfer</label>
                        <input type="file" class="form-control" id="tf" name="tf" placeholder="Bukti Transfer" required>
                    </div>
                    <div class="col-md-3 mb-4">
                        <label class="form-label">Total Pembayaran</label>
                        <p>{{ __('Rp.').number_format($total_price,2,',','.') }}</p>
                        <input type="hidden" name="total_price" value="{{ $total_price }}">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <!-- <button class="btn btn-primary me-md-2" type="button">Button</button> -->
                        <button class="btn btn-sm btn-outline-primary" type="submit" @if(\Setting::getTotalPrice() == 0) disabled @endif>CHECKOUT CART</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- CHECKOUT -->

@endsection
