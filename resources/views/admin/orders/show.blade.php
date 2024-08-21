@extends('layouts.adm.base')
@section('title', $title)

@push('style')
@endpush

@push('scripts')
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title .' ['. $dt->code_order .']' }}</h3>
            <div class="card-tools">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
        <div class="card-body row">
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Code : </strong>
                    {{ $dt->code_order }}
                </div>
                <div class="form-group">
                    <strong>Customer : </strong>
                    {{ $dt->customer->name }}
                </div>
                <div class="form-group">
                    <strong>Phone : </strong>
                    {{ '+62'.$dt->customer->phone }}
                </div>
                <div class="form-group">
                    <strong>Address : </strong>
                    {{ strtoupper($dt->address) }}
                </div>
                <div class="form-group">
                    <strong>Total Price : </strong>
                    {{ __('Rp.').number_format($dt->total_price,2,',','.') }}
                </div>
                <div class="form-group">
                    <strong>Status : </strong>
                    {{ $dt->status }}
                </div>
                <div class="form-group">
                    <strong>Notes : </strong>
                    {{ $dt->note }}
                </div>
                <div class="form-group">
                    <strong>Tanggal Pengantaran Pesanan : </strong>
                    @if ($dt->status == 'katering')
                        {{ $dt->tgl_pesanan }}
                    @else
                        {{ $dt->created_at }}
                    @endif
                </div>
                <div class="form-group">
                    <strong>Tanggal Pesanan di Buat : </strong>
                    {{ $dt->created_at }}
                </div>
                {{-- <div class="form-group">
                    <strong>Tanggal di Ubah : </strong>
                    {{ $dt->updated_at }}
                </div> --}}
            </div>
            <div class="col-md-4">
                <a href="{{ asset('images/tf') . "/" . $dt->tf }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('images/tf') . "/" . $dt->tf }}" class="img-fluid" alt="Bukti Transferan" width="300px" height="auto">
                </a>
            </div>
        </div>
    </div>
@endsection
