@extends('layouts.adm.base')
@section('title', $title)

@push('style')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@endpush

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
            {{-- <div class="card-tools">
                <a href="{{ route('admin.orders.create') }}" class="btn btn-success btn-sm">{{ trans('global.add')." ".trans('menu.transaction.title') }}</a>
            </div> --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Customer</th>
                        <th>Total Harga</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>{{ trans('global.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $dt)
                    <tr>
                        <td>{{ $dt->code_order }}</td>
                        <td>{{ $dt->customer->name }}</td>
                        <td>{{ __('Rp.').number_format($dt->total_price,2,',','.') }}</td>
                        <td>{{ $dt->address }}</td>
                        <td>
                            {{-- {{ $dt->status }} --}}
                            @if ($dt->status == 'UNPAID')
                                <a href="{{ route('admin.orders.status', $dt->id) }}" class="btn btn-warning">{{ $dt->status }}</a>
                            @elseif ($dt->status == 'PAID')
                                <a href="{{ route('admin.orders.status', $dt->id) }}" class="btn btn-info">{{ $dt->status }}</a>
                            @elseif ($dt->status == 'SUCCESS')
                                <a href="{{ route('admin.orders.status', $dt->id) }}" class="btn btn-success">{{ $dt->status }}</a>
                            @else
                                <a href="{{ route('admin.orders.status', $dt->id) }}" class="btn btn-danger">{{ $dt->status }}</a>
                            @endif
                        </td>
                        <td>{{ $dt->updated_at ? $dt->updated_at : $dt->created_at }}</td>
                        <td class="text-center">
                            <form action="{{ route('admin.orders.destroy', $dt->id) }}" class="row" method="POST">
                                @method('DELETE')
                                @csrf
                                <div class="col-md-3">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.orders.show', $dt->id) }}">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a class="btn btn-success btn-sm" href="{{ route('admin.order_products.show', $dt->id) }}">
                                        <i class="fas fa-clipboard-list"></i>
                                    </a>
                                </div>
                                @if ($dt->status == 'PAID')
                                    <div class="col-md-3">
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.order_deliveries.show', $dt->id) }}">
                                            <i class="fas fa-clipboard-list"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn btn-warning btn-sm" href="{{ route('admin.order_complains.show', $dt->id) }}">
                                            <i class="fas fa-clipboard-list"></i>
                                        </a>
                                    </div>
                                @endif
                                {{-- <div class="col-md-3">
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div> --}}
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@push('scripts')

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Page specific script -->
    <script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["csv", "excel", "pdf", "print", "colvis"],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>

@endpush
