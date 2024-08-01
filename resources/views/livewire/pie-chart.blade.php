<div class="row">

    <!-- BEGIN col-8 -->
    <div class="col-xl-12">
        <div class="widget-chart with-sidebar" data-bs-theme="dark">
            <div class="widget-chart-content bg-gray-800">
                <h4 class="chart-title">
                    Statitik
                    <small>Where do our visitors come from</small>
                </h4>
                <div id="apex-area-chart" class="widget-chart-full-width dark-mode" style="height: 257px;"></div>
            </div>
            <div class="widget-chart-sidebar bg-gray-900">
                <div class="chart-number">
                    1,225,729
                    <small>Total visitors</small>
                </div>
                <div class="flex-grow-1 d-flex align-items-center">
                    <div id="visitors-donut-chart" style="height: 180px"></div>
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
    {{ $pengeluaran_harian_minggu_ini }}
    <!-- END col-8 -->
</div>
@push('scripts')
    <script src="{{ asset('/assets/plugins/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script>
        // Konversi data PHP ke JavaScript
        let pengeluaranMingguan = @json($pengeluaran_harian_minggu_ini);
        let pemasukanMingguan = @json($pemasukan_harian_minggu_ini);

        // Proses data untuk chart
        let dates = [];
        let pengeluaranData = [];
        let pemasukanData = [];

        pengeluaranMingguan.forEach(item => {
            dates.push(item.date);
            pengeluaranData.push(item.total);
        });

        pemasukanMingguan.forEach(item => {
            if (!dates.includes(item.date)) {
                dates.push(item.date);
            }
            pemasukanData.push(item.total);
        });

        var options = {
            chart: {
                height: 400,
                type: 'area',
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            colors: ['#FF4560', '#008FFB'],
            series: [{
                    name: 'Pengeluaran',
                    data: pengeluaranData
                },
                {
                    name: 'Pemasukan',
                    data: pemasukanData
                }
            ],
            xaxis: {
                type: 'datetime',
                categories: dates,
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy'
                }
            }
        };

        var chart = new ApexCharts(
            document.querySelector('#apex-area-chart'),
            options
        );

        chart.render();
    </script>
@endpush
