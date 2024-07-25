@extends('layouts.default')

@section('title', 'Managed Tables - Extension Combination')

@push('css')
    <link href="{{ asset('/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-autofill-bs5/css/autoFill.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-colreorder-bs5/css/colReorder.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-rowreorder-bs5/css/rowReorder.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="{{ asset('/assets/plugins/datatables.net/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-autofill/js/dataTables.autoFill.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-autofill-bs5/js/autoFill.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-colreorder/js/dataTables.colReorder.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-colreorder-bs5/js/colReorder.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-rowreorder/js/dataTables.rowReorder.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-rowreorder-bs5/js/rowReorder.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-select-bs5/js/select.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/assets/plugins/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('/assets/js/demo/table-manage-combine.demo.js') }}"></script>
    <script src="{{ asset('/assets/plugins/@highlightjs/cdn-assets/highlight.min.js') }}"></script>
    <script src="{{ asset('/assets/js/demo/render.highlight.js') }}"></script>
    <script src="{{ asset('/assets/plugins/ionicons/dist/ionicons/ionicons.js') }}"></script>
@endpush

@section('content')
    <!-- BEGIN breadcrumb -->
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Tables</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Managed Tables</a></li>
        <li class="breadcrumb-item active">Extension Combination</li>
    </ol>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">Managed Tables - Extension Combination <small>header small text goes here...</small></h1>
    <!-- END page-header -->
    <!-- BEGIN row -->
    <div class="row">
        <!-- BEGIN col-10 -->
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <!-- BEGIN panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">DataTable - Extension Combination</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                                class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                                class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
                                class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                                class="fa fa-times"></i></a>
                    </div>
                </div>
                <!-- END panel-heading -->
                <!-- BEGIN panel-body -->
                <a href="{{ route('rekening.create') }}" class="btn btn-primary btn-sm">Tambah
                    <ion-icon name="add-circle-outline"></ion-icon></a>
                <div class="panel-body">
                    <table id="data-table-combine" width="100%"
                        class="table table-striped table-bordered align-middle text-nowrap">
                        <thead>
                            <tr>
                                <th width="1%"></th>
                                <th width="1%" data-orderable="false"></th>
                                <th class="text-nowrap">Nama</th>
                                <th class="text-nowrap">Sisa Saldo</th>
                                <th class="text-nowrap"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="even gradeC">
                                    <td width="1%" class="fw-bold">{{ $loop->iteration }}</td>
                                    <td width="1%"><img src="/assets/img/user/user-2.jpg"
                                            class="rounded h-30px my-n1 mx-n1" /></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ 'Rp ' . number_format($item->saldo, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('rekening.edit', $item->id) }}"
                                            class="font-large btn btn-warning">
                                            <ion-icon name="create-outline"></ion-icon>
                                            <a href="{{ route('rekening.destroy', $item->id) }}" class="btn btn-danger"
                                                data-confirm-delete="true"><ion-icon name="trash-outline"></ion-icon></a>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END panel -->
        </div>
        <!-- END col-10 -->
    </div>
    <!-- END row -->
@endsection
