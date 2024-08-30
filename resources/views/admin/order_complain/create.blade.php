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

{!! Form::open(array('route' => ['admin.order_complains.update', $data->id],'method'=>'PUT','enctype'=>"multipart/form-data")) !!}
{{-- <form action="{{ route('admin.order_deliveries.store') }}" method="POST"> --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create New Data</h3>
            <div class="card-tools">
                <a href="{{ route('admin.order_complains.show', $data->id) }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
        <div class="card-body row">
            <input type="hidden" name="id" id="id" value="{{ $data->id }}" required>
            <input type="hidden" name="transaction_id" id="transaction_id" value="{{ $data->transaction_id }}" required>
            {{-- <div class="form-group">
                <strong>Trasaction ID :</strong>
                {!! Form::text('id', $data->id, ['placeholder' => 'Trasaction ID', 'class' => 'form-control']) !!}
            </div> --}}
            <div class="form-group col-md-4">
                <strong>NOTES FROM CUSTOMER :</strong>
                {!! Form::textarea('note', $data->note, ['class' => 'form-control', 'rows'=>'5', 'style' => 'resize:none', 'disabled']) !!}
            </div>
            <div class="form-group col-md-4">
                <strong>NOTES FROM CUSTOMER :</strong>
                {!! Form::textarea('note_admin', $data->note_admin == null ? '' : $data->note_admin, ['placeholder' => 'NOTES FROM ADMIN', 'class' => 'form-control', 'rows'=>'5', 'style' => 'resize:none', 'required']) !!}
            </div>
            <div class="form-group col-md-4">
                <strong>STATUS RETURN :</strong>
                <select name="status" id="myselect" class="form-control" required>
                    <option value="" selected disabled>Please Select Status!</option>
                    <option value="false">PROCESS</option>
                    <option value="true">SUCCESS</option>
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
{{-- </form> --}}
{!! Form::close() !!}

@endsection
