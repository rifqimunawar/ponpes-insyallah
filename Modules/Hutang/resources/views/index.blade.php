@extends('hutang::layouts.master')

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
    <h1 class="page-header">Form Hutang <small>{{ $userLogin->name }}</small></h1>
    <!-- END page-header -->
    <!-- BEGIN row -->
    <div class="row">
        <!-- BEGIN col-10 -->
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <!-- BEGIN panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">DataTable - Hutang</h4>
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
                <a href="{{ route('hutang.create') }}" class="btn btn-primary btn-sm">Tambah
                    <ion-icon name="add-circle-outline"></ion-icon></a>
                <div class="panel-body">
                    <table id="data-table-combine" width="100%"
                        class="table table-striped table-bordered align-middle text-nowrap">
                        <thead>
                            <tr>
                                <th width="1%"></th>
                                <th width="1%" data-orderable="false"></th>
                                <th class="text-nowrap">Tanggal Peminjaman</th>
                                <th class="text-nowrap">Nama</th>
                                <th class="text-nowrap">Nominal</th>
                                <th class="text-nowrap">Terbayar</th>
                                <th class="text-nowrap">Rekening Tujuan</th>
                                <th class="text-nowrap">Status</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="even gradeC">
                                    <td width="1%" class="fw-bold">{{ $loop->iteration }}</td>
                                    <td width="1%"><img src="{{ asset('/assets/img/user/' . $userLogin->avatar) }}"
                                            class="rounded h-30px my-n1 mx-n1" /></td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ 'Rp ' . number_format($item->nominal, 0, ',', '.') }}</td>
                                    <td>{{ 'Rp ' . number_format($item->nominal_terbayar, 0, ',', '.') }}</td>
                                    <td>{{ $item->rekening->name }}</td>
                                    <td class="{{ $item->status == 0 ? 'bg-danger' : 'bg-success' }}">
                                        {{ $item->status == 0 ? 'Belum Lunas' : 'Lunas' }}
                                    </td>
                                    <td class="text-center">
                                        {{-- <a href="{{ route('hutang.bayar', $item->id) }}" class="font-large btn btn-info">
                                            <ion-icon name="cash-outline"></ion-icon></a> --}}
                                        <a href="{{ route('hutang.edit', $item->id) }}" class="font-large btn btn-warning">
                                            <ion-icon name="create-outline"></ion-icon></a>
                                        {{-- <a href="{{ route('hutang.destroy', $item->id) }}" class="btn btn-danger"
                                            data-confirm-delete="true"><ion-icon name="trash-outline"></ion-icon></a> --}}
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
