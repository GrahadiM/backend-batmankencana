@extends('layouts.fe.index')

@section('content')

    <!-- CHECKOUT -->
    <div class="container mt-5 mb-5">
        <div class="card border-0" action="" method="post">
            <div class="card-header">
                <div class="row">
                    <h3 class="card-title col-md-9">Order Complain History - [{{ $order->code_order }}]</h3>
                    <div class="card-tools col-md-3 d-flex justify-content-end">
                        <a href="{{ route('fe.history') }}" class="btn btn-outline-danger btn-sm m-2">Back to History</a>
                        <button type="button" class="btn btn-outline-success btn-sm m-2" onclick="event.preventDefault(); document.getElementById('historyComplainCreate-form-{{ $order->id }}').submit();">Create Complain</button>

                        <!-- History Complain -->
                        <form id="historyComplainCreate-form-{{ $order->id }}" action="{{ route('fe.historyComplainCreate') }}" method="GET" class="d-none">
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                        </form>
                        <!-- History Complain -->
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Note</th>
                            <th>Status Return</th>
                            <th scope="col">Date of Created</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($complain as $item)
                            <tr>
                                <td>{{ $item->note }}</td>
                                <td>{{ $item->status == 'false' ? 'PROCESS' : 'SUCCESS' }}</td>
                                <td>{{ Carbon\Carbon::parse($item->created_at)->format('l, d F Y H:i') }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Action">
                                        <button type="button" class="btn btn-outline-primary btn-action" onclick="event.preventDefault(); document.getElementById('historyComplainDetail-form-{{ $item->id }}').submit();">
                                            <ion-icon name="list-outline"></ion-icon>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- History Product -->
                            <form id="historyComplainDetail-form-{{ $item->id }}" action="{{ route('fe.historyComplainDetail') }}" method="GET" class="d-none">
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <input type="hidden" name="transaction_id" value="{{ $item->transaction_id }}">
                            </form>
                            <!-- History Product -->
                        @empty
                            <tr>
                                <th class="text-center" colspan="3">DATA NOT FOUND OR EMPTY!</th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- CHECKOUT -->

@endsection
