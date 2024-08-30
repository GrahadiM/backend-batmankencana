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
            <h3 class="card-title">{{ $title.' History - ['.$tr->code_order.']' }}</h3>
            <div class="card-tools">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Note from Customer</th>
                        <th>Note from Admin</th>
                        <th>Status Return</th>
                        <th>Date of Created</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $key => $dt)
                        <tr>
                            <td>{{ $dt->note }}</td>
                            <td>{{ $dt->note_admin }}</td>
                            <td>{{ $dt->status == 'false' ? 'PROCESS' : 'SUCCESS' }}</td>
                            <td>{{ Carbon\Carbon::parse($dt->created_at)->format('l, d F Y H:i') }}</td>
                            <td>
                                @if ($dt->status == 'false' || $dt->note_admin == null)
                                    <a href="{{ route('admin.order_complains.edit', $dt->id) }}" class="btn btn-outline-primary btn-sm">Balas</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5"><center>Data Kosong!</center></td>
                        </tr>
                    @endforelse
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
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        "buttons": ["csv"]
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
