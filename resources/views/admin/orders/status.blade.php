@extends('layouts.adm.base')
@section('title', $title)

@push('style')
@endpush

@push('scripts')
@endpush

@section('content')
    {!! Form::model($dt, ['method' => 'PUT', 'route' => ['admin.orders.status_update', $dt->id]]) !!}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Status</h3>
            <div class="card-tools">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-2">
                        <div class="mb-2"><strong>Code Order : </strong></div>
                        {!! Form::text('code_order', $dt->code_order, ['placeholder' => 'Code Order', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group mb-2">
                        <div class="mb-2"><strong>Total Price : </strong></div>
                        {!! Form::text('total_price', __('Rp.').number_format($dt->total_price,2,',','.'), ['placeholder' => 'Total Price', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group mb-2">
                        <div class="mb-2"><strong>Status : </strong></div>
                        <select name="status" id="myselect" class="form-control">
                            <option value="{{ $dt->status }}" selected>{{ $dt->status }}</option>
                            @if ($dt->status == 'UNPAID')
                                <option value="PAID">PAID</option>
                                {{-- <option value="SUCCESS">SUCCESS</option> --}}
                            @elseif ($dt->status == 'PAID')
                                <option value="SUCCESS">SUCCESS</option>
                            @elseif ($dt->status == 'SUCCESS')
                                <option value="PAID">PAID</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group mb-2">
                        <div class="mb-2"><strong>Notes : </strong></div>
                        {!! Form::textarea('note', $dt->note, ['placeholder' => 'Notes', 'class' => 'form-control', 'rows'=>'7', 'style' => 'resize:none']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-2"><strong>Bukti Transferan : </strong></div>
                    <a href="{{ asset('images/tf') . "/" . $dt->tf }}" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('images/tf') . "/" . $dt->tf }}" class="img-fluid" alt="Bukti Transferan" height="auto">
                    </a>
                </div>
                <div class="col-sm-12 col-md-12 col-xs-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection
