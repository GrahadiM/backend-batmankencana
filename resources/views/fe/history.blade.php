@extends('layouts.fe.index')

@section('content')

    <!-- CHECKOUT -->
    <div class="container">
        <div class="card border-0" action="" method="post">
            <div class="card-header text-center">
                <h3>Order History</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Code Order</th>
                            <th scope="col">Bukti TF</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Address</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date Order</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($histories as $item)
                            <tr>
                                <td>{{ $item->code_order }}</td>
                                <td>
                                    <a href="{{ asset('images/tf').'/'.$item->tf }}" target="_blank" rel="noopener noreferrer">
                                        <img src="{{ asset('images/tf').'/'.$item->tf }}" alt="{{ $item->tf }}" width="50" class="tf-img">
                                    </a>
                                </td>
                                <td>{{ __('Rp.').number_format($item->total_price,2,',','.') }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Action">
                                        <button type="button" class="btn btn-outline-primary btn-action" onclick="event.preventDefault(); document.getElementById('historyProduct-form-{{ $item->id }}').submit();">
                                            <ion-icon name="list-outline"></ion-icon>
                                        </button>
                                        @if ($item->payment_status == 2)
                                            <button type="button" class="btn btn-outline-info btn-action" onclick="event.preventDefault(); document.getElementById('historyDelivery-form-{{ $item->id }}').submit();">
                                                <ion-icon name="list-outline"></ion-icon>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger btn-action" onclick="event.preventDefault(); document.getElementById('historyComplain-form-{{ $item->id }}').submit();">
                                                <ion-icon name="chatbubbles"></ion-icon>
                                            </button>
                                        @endif
                                        {{-- @if ($item->payment_status == 1)
                                            <button type="button" class="btn btn-warning btn-action" onclick="event.preventDefault(); document.getElementById('pay-form-{{ $item->id }}').submit();">
                                                <ion-icon name="cash-outline"></ion-icon>
                                            </button>
                                        @endif --}}
                                    </div>
                                </td>
                            </tr>

                            <form action="" method="get" class="d-none"></form>
                            <!-- History Product -->
                            <form id="historyProduct-form-{{ $item->id }}" action="{{ route('fe.historyProduct') }}" method="GET" class="d-none">
                                <input type="hidden" name="order_id" value="{{ $item->id }}">
                            </form>
                            <!-- History Product -->

                            <!-- History Complain -->
                            <form id="historyComplain-form-{{ $item->id }}" action="{{ route('fe.historyComplain') }}" method="GET" class="d-none">
                                <input type="hidden" name="order_id" value="{{ $item->id }}">
                            </form>
                            <!-- History Complain -->

                            <!-- History Delivery -->
                            <form id="historyDelivery-form-{{ $item->id }}" action="{{ route('fe.historyDelivery') }}" method="GET" class="d-none">
                                <input type="hidden" name="order_id" value="{{ $item->id }}">
                            </form>
                            <!-- History Delivery -->

                            <!-- Pay -->
                            <form id="pay-form-{{ $item->id }}" action="{{ route('fe.pay') }}" method="POST" class="d-none">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $item->id }}">
                                <input type="hidden" name="status" value="PAID">
                            </form>
                            <!-- Pay -->
                        @empty
                            <tr>
                                <th class="text-center" colspan="6">DATA NOT FOUND OR EMPTY!</th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- CHECKOUT -->

@endsection
