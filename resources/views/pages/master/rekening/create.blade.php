@extends('layouts.default')

@section('title', 'master')

@push('css')
    <link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
    <link href="/assets/plugins/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet" />
    <link href="/assets/plugins/tag-it/css/jquery.tagit.css" rel="stylesheet" />
    <link href="/assets/plugins/spectrum-colorpicker2/dist/spectrum.min.css" rel="stylesheet" />
    <link href="/assets/plugins/select-picker/dist/picker.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="/assets/plugins/moment/min/moment.min.js"></script>
    <script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="/assets/plugins/select2/dist/js/select2.min.js"></script>
    <script src="/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
    <script src="/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="/assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
    <script src="/assets/plugins/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="/assets/plugins/tag-it/js/tag-it.min.js"></script>
    <script src="/assets/plugins/clipboard/dist/clipboard.min.js"></script>
    <script src="/assets/plugins/spectrum-colorpicker2/dist/spectrum.min.js"></script>
    <script src="/assets/plugins/select-picker/dist/picker.min.js"></script>
    <script src="/assets/js/demo/form-plugins.demo.js"></script>
    <script src="/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
    <script src="/assets/js/demo/render.highlight.js"></script>

    <!-- Pastikan Anda menyertakan jQuery dan jQuery UI jika menggunakan datepicker dari jQuery UI -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}
@endpush

@section('content')
    <!-- BEGIN breadcrumb -->
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Form Stuff</a></li>
        <li class="breadcrumb-item active">Form Plugins</li>
    </ol>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">Form Rekening <small>{{ $userLogin->name }}</small></h1>
    <!-- END page-header -->
    <!-- BEGIN row -->
    <div class="row">
        <!-- BEGIN col-6 -->
        <div class="col-xl-8">
            <!-- BEGIN panel -->
            <div class="panel panel-inverse" data-sortable-id="form-plugins-3">
                <!-- BEGIN panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">Datepicker</h4>
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
                <div class="panel-body p-0">
                    <form class="form-horizontal form-bordered" action="{{ route('rekening.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="form-label col-form-label col-lg-4">Nama</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control uang" name="name" required>
                            </div>
                        </div>
                        <div class="text-center mt-4 mb-4">
                            <a href="{{ route('rekening.index') }}" class="btn btn-warning">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END panel -->
        </div>
        <!-- END col-6 -->
    </div>
    <!-- END row -->
@endsection

<!-- script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var rupiah = document.getElementById('rupiah');

        rupiah.addEventListener('keyup', function(e) {
            // Format nilai dengan prefix 'Rp. '
            // rupiah.value = formatRupiah(this.value, 'Rp. ');
            rupiah.value = formatRupiah(this.value, '');
        });

        /**
         * Fungsi untuk format angka menjadi format ribuan dengan prefix
         * @param {string} angka - Nilai input yang akan diformat
         * @param {string} prefix - Prefix yang akan ditambahkan
         * @return {string} - Nilai yang telah diformat
         */
        function formatRupiah(angka, prefix) {
            // Menghapus semua karakter non-numeric kecuali koma
            var number_string = angka.replace(/[^,\d]/g, '').toString();
            var split = number_string.split(',');
            var sisa = split[0].length % 3;
            var rupiah = split[0].substr(0, sisa);
            var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // Tambahkan titik setiap 3 digit ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            // Tambahkan koma jika ada bagian desimal
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

            // Tambahkan prefix jika disediakan
            return prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
        }
    });


    $("#datepicker-autoClose").datepicker({
        todayHighlight: true,
        autoclose: true
    });
</script>
