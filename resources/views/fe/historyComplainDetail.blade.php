@extends('layouts.fe.index')

@section('content')

    <!-- CHECKOUT -->
    <div class="container mb-5">
        <div class="card border-0" action="" method="post">
            <div class="card-header">
                <div class="row">
                    <h3 class="card-title col-md-9">Order Complain History - [{{ $order->code_order }}]</h3>
                    <div class="card-tools col-md-3 d-flex justify-content-end">
                        <a href="{{ route('fe.history') }}" class="btn btn-outline-danger btn-sm m-2">Back to History</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <form class="card-body" action="{{ route('fe.historyComplainStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="title">#Detail Complaint</h2>
                <div class="row mb-4">
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <div class="col-md-6 mb-4">
                        <label for="note" class="form-label">NOTES</label>
                        <textarea name="note" id="note" rows="5" class="form-control" disabled>{{ $complain->note }}</textarea>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="note_admin" class="form-label">NOTES FROM ADMIN</label>
                        <textarea name="note_admin" id="note_admin" rows="5" class="form-control" disabled>{{ $complain->note_admin }}</textarea>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="status" class="form-label">STATUS RETURN</label>
                        <input type="text" name="status" id="status" class="form-control" value="{{ $complain->status == 'false' ? 'PROCESS' : 'SUCCESS' }}" disabled>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="total_price" class="form-label">NOMINAL RETURN</label>
                        <input type="text" name="total_price" id="total_price" class="form-control" value="{{ __('Rp.').number_format($order->total_price,2,',','.') }}" disabled>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- CHECKOUT -->

@endsection
