@extends('layouts.fe.index')

@section('content')

    <!-- CHECKOUT -->
    <div class="container mt-5 mb-5">
        <div class="card border-0" action="" method="post">
            <div class="card-header text-center">
                <h3>Order Delivery History - [{{ $order->code_order }}]</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($location as $item)
                            <tr>
                                <td>{{ $item->location_name }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <th class="text-center" colspan="2">DATA NOT FOUND OR EMPTY!</th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- CHECKOUT -->

@endsection
