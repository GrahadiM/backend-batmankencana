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

{!! Form::open(array('route' => 'admin.order_deliveries.store','method'=>'POST','enctype'=>"multipart/form-data")) !!}
{{-- <form action="{{ route('admin.order_deliveries.store') }}" method="POST"> --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create New Data</h3>
            <div class="card-tools">
                <a href="{{ route('admin.order_deliveries.show', $tr->id) }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <input type="hidden" name="transaction_id" id="transaction_id" value="{{ $tr->id }}" required>
            {{-- <div class="form-group">
                <strong>Trasaction ID :</strong>
                {!! Form::text('id', $tr->id, ['placeholder' => 'Trasaction ID', 'class' => 'form-control']) !!}
            </div> --}}
            <div class="form-group">
                <strong>Location :</strong>
                {!! Form::textarea('location_name', null, ['placeholder' => 'Location', 'class' => 'form-control', 'rows'=>'5', 'style' => 'resize:none']) !!}
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
{{-- </form> --}}
{!! Form::close() !!}

@endsection
