@extends('layouts.adm.base')
@section('title', $title)

@push('style')
@endpush

@push('scripts')
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b><u>Detail</u></b></h3>
            <div class="card-tools">
                <a href="{{ route('admin.products_qty.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
        <div class="card-body row">
            <div class="col-lg-6">
                <div class="form-group">
                    <strong>Nama : </strong>
                    {{ $dt->name }}
                </div>
                <div class="form-group">
                    <strong>Brand : </strong>
                    {{ $dt->brand }}
                </div>
                <div class="form-group">
                    <strong>QTY : </strong>
                    {{ $dt->qty }}
                </div>
            </div>
            <div class="col-lg-6">
                {{-- <div class="form-group">
                    <strong>Detail : </strong>
                    {{ $dt->body == null ? '-' : $dt->body }}
                </div> --}}
                <div class="form-group">
                    <strong>Tanggal di Buat : </strong>
                    {{ $dt->created_at }}
                </div>
                <div class="form-group">
                    <strong>Tanggal di Ubah : </strong>
                    {{ $dt->updated_at }}
                </div>
            </div>
        </div>
    </div>
@endsection
