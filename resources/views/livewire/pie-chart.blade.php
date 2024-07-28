@push('scripts')
    <script src="/assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
    <script src="/assets/js/prod/chart-apex.prod.js"></script>
@endpush

<div class="row">

    <!-- BEGIN col-8 -->
    <div class="col-xl-8">
        <div class="widget-chart with-sidebar" data-bs-theme="dark">
            <div class="widget-chart-content bg-gray-800">
                <h4 class="chart-title">
                    Statitik
                    <small>Where do our visitors come from</small>
                </h4>
                <div id="visitors-line-chart" class="widget-chart-full-width dark-mode" style="height: 257px;"></div>
            </div>
            <div class="widget-chart-sidebar bg-gray-900">
                <div class="chart-number">
                    1,225,729
                    <small>Total visitors</small>
                </div>
                <div class="flex-grow-1 d-flex align-items-center">
                    <div id="visitors-donut-chart" data-bs-theme="dark" style="height: 180px"></div>
                </div>
                <ul class="chart-legend fs-11px">
                    <li><i class="fa fa-circle fa-fw text-blue fs-9px me-5px t-minus-1"></i> 34.0% <span>New
                            Visitors</span></li>
                    <li><i class="fa fa-circle fa-fw text-teal fs-9px me-5px t-minus-1"></i> 56.0% <span>Return
                            Visitors</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END col-8 -->
    <!-- BEGIN col-4 -->
    <div class="col-xl-4">
        <div class="panel panel-inverse" data-sortable-id="index-1">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Range Waktu
                </h4>
            </div>
            <div class="list-group list-group-flush " data-bs-theme="dark">
                <div class="list-group-item list-group-item-action d-flex">
                    <span class="col-xl-3">Dari Tanggal</span>
                    <input type="date" class="form-control" required wire:model.live="tanggal_awal">
                </div>
                <div class="list-group-item list-group-item-action d-flex">
                    <span class="col-xl-3">Sampai Tanggal</span>
                    <input type="date" class="form-control" required wire:model.live="tanggal_akhir">
                </div>
            </div>
        </div>
    </div>



    <div class="col-xl-6">
        <!-- BEGIN panel -->
        <div class="panel panel-inverse" data-sortable-id="chart-js-10">
            <div class="panel-heading">
                <h4 class="panel-title">Chart Pengeluaran</h4>
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
            <div class="panel-body">
            </div>
            <div class="panel-body p-0 pe-10px ps-5px">
                <div id="apex-pie-chart"></div>
            </div>
        </div>
        <!-- END panel -->
    </div>
    <div class="col-xl-6">
        <!-- BEGIN panel -->
        <div class="panel panel-inverse" data-sortable-id="chart-js-10">
            <div class="panel-heading">
                <h4 class="panel-title">Chart Pengeluaran</h4>
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
            <div class="panel-body">
            </div>
            <div class="panel-body p-0 pe-10px ps-5px">
                <div id="apex-pie-chart2"></div>
            </div>
        </div>
        <!-- END panel -->
    </div>
    <p id="kegiatan-list" data-kegiatans='@json($kegiatans)'></p>
    <p id="kebutuhan-list" data-kebutuhans='@json($kebutuhans)'></p>
</div>
