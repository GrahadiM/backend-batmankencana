@extends('layouts.adm.base')
@section('title', $title)

@push('style')
@endpush

@push('scripts')
@endpush

@section('content')

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

{!! Form::open(array('route' => 'admin.products_qty.store','method'=>'POST','enctype'=>"multipart/form-data")) !!}
{{-- <form action="{{ route('admin.products_qty.store') }}" method="POST"> --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create New Data</h3>
            <div class="card-tools">
                <a href="{{ route('admin.products_qty.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('required','placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>Brand:</strong>
                {!! Form::text('brand', null, array('required','placeholder' => 'Brand','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>Qty:</strong>
                {!! Form::number('qty', null, array('required','placeholder' => 'Qty','class' => 'form-control')) !!}
            </div>
            {{-- <div class="form-group">
                <strong>Detail:</strong>
                {!! Form::text('body', null, array('required','placeholder' => 'Detail','class' => 'form-control')) !!}
            </div> --}}
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
{{-- </form> --}}
{!! Form::close() !!}

@endsection
