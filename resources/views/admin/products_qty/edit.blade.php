@extends('layouts.adm.base')
@section('title', $title)

@push('style')
@endpush

@push('scripts')
@endpush

@section('content')
    {!! Form::model($dt, ['method' => 'PATCH', 'route' => ['admin.products_qty.update', $dt->id]]) !!}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data</h3>
            <div class="card-tools">
                <a href="{{ route('admin.products_qty.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="mb-2"><strong>Name : </strong></div>
                {!! Form::text('name', null, ['required', 'value' => $dt->name, 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <strong>Brand:</strong>
                {!! Form::text('brand', null, array('required','value' => $dt->brand,'class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>Qty:</strong>
                {!! Form::number('qty', null, array('required','value' => $dt->qty,'class' => 'form-control')) !!}
            </div>
            {{-- <div class="form-group">
                <strong>Detail:</strong>
                {!! Form::text('body', null, array('required', 'placeholder' => 'Detail','class' => 'form-control')) !!}
            </div> --}}
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection
