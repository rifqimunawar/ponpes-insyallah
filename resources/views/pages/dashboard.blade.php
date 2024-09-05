@extends('layouts.default')

@section('title', 'Dashboard')

@push('css')
    <link href="{{ asset('/assets/plugins/jvectormap-next/jquery-jvectormap.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/nvd3/build/nv.d3.css') }}" rel="stylesheet" />
    <style>
        .widget-stats {
            transition: background-color 0.5s ease;
        }

        .bg-danger {
            background-color: #dc3545;
        }

        .bg-warning {
            background-color: #ffc107;
        }

        .bg-success {
            background-color: #28a745;
        }

        .bg-secondary {
            background-color: #6c757d;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('/assets/plugins/d3/d3.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/nvd3/build/nv.d3.js') }}"></script>
    <script src="{{ asset('/assets/plugins/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/jvectormap-content/world-mill.js') }}"></script>
    <script src="{{ asset('/assets/plugins/gritter/js/jquery.gritter.js') }}"></script>
    <script src="{{ asset('/assets/plugins/apexcharts/dist/apexcharts.min.js') }}"></script>
@endpush

@section('content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <h1 class="page-header">Dashboard <small>Statistik Keuangan {{ $userLogin->name }}</small></h1>
    <div class="row">
        <a href="" class="col-xl-3 col-md-6" style="text-decoration: none;">
            <div class="widget widget-stats bg-teal">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">SISA SALDO</div>
                    <div class="stats-number">{{ 'Rp ' . number_format($sisa_saldo, 0, ',', '.') }}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 70.1%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (70.1%)</div>
                </div>
            </div>
        </a>
        <a href="{{ route('pengeluaran.create') }}" class="col-xl-3 col-md-6" style="text-decoration: none;">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">PENGELUARAN BULAN INI</div>
                    <div class="stats-number">{{ 'Rp ' . number_format($total_pengeluaran_bulan_ini, 0, ',', '.') }}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 40.5%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (40.5%)</div>
                </div>
            </div>
        </a>
        <a href="{{ route('pemasukan.create') }}" class="col-xl-3 col-md-6" style="text-decoration: none">
            <div class="widget widget-stats bg-indigo">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">PEMASUKAN BULAN INI</div>
                    <div class="stats-number">{{ 'Rp ' . number_format($total_pemasukan_bulan_ini, 0, ',', '.') }}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 76.3%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (76.3%)</div>
                </div>
            </div>
        </a>
        <div class="col-xl-3 col-md-6">
            @php
                $initialColor = $pengeluaran_hari_ini >= $target_pengeluaran_harian ? 'bg-danger' : 'bg-success';
                $widgetId = $pengeluaran_hari_ini >= $target_pengeluaran_harian ? 'color-widget' : '';
            @endphp
            <div class="widget widget-stats {{ $initialColor }}" id="{{ $widgetId }}">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-comment-alt fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">TARGET PENGELUARAN HARIAN</div>
                    <div class="stats-number">{{ 'Rp ' . number_format($target_pengeluaran_harian, 0, ',', '.') }}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 54.9%;"></div>
                    </div>
                    <div class="stats-desc">
                        Sudah Keluar
                        ({{ $pengeluaran_hari_ini ? 'Rp ' . number_format($pengeluaran_hari_ini, 0, ',', '.') : '0' }})
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="widget-chart with-sidebar" data-bs-theme="dark">
                <div class="widget-chart-content bg-gray-800">
                    <h4 class="chart-title">
                        Statistik
                        <small>Where do our visitors come from</small>
                    </h4>
                    <div id="apex-area-chart" class="widget-chart-full-width dark-mode" style="height: 257px;"></div>
                </div>
                <div class="widget-chart-sidebar bg-gray-900">
                    <div class="chart-number text-teal mb-2">
                        <small>Total Pengeluaran Hari Ini</small>
                        {{ $pengeluaran_hari_ini ? 'Rp ' . number_format($pengeluaran_hari_ini, 0, ',', '.') : '0' }}
                    </div>
                    <div class="chart-number text-teal mb-2">
                        <small>Total Pengeluaran Minggu Ini</small>
                        {{ $total_pengeluaran_minggu_ini ? 'Rp ' . number_format($total_pengeluaran_minggu_ini, 0, ',', '.') : '0' }}
                    </div>
                    <div class="chart-number text-teal mb-2">
                        <small>Total Pengeluaran Bulan Ini</small>
                        {{ $total_pengeluaran_bulan_ini ? 'Rp ' . number_format($total_pengeluaran_bulan_ini, 0, ',', '.') : '0' }}
                    </div>
                    <div class="chart-number text-teal mb-4">
                        <small>Total Pengeluaran Tahun Ini</small>
                        {{ $total_pengeluaran_tahun_ini ? 'Rp ' . number_format($total_pengeluaran_tahun_ini, 0, ',', '.') : '0' }}
                    </div>

                    <div class="chart-number text-blue mb-2">
                        <small>Total Pemasukan Minggu Ini</small>
                        {{ $total_pemasukan_minggu_ini ? 'Rp ' . number_format($total_pemasukan_minggu_ini, 0, ',', '.') : '0' }}
                    </div>
                    <div class="chart-number text-blue mb-2">
                        <small>Total Pemasukan Bulan Ini</small>
                        {{ $total_pemasukan_bulan_ini ? 'Rp ' . number_format($total_pemasukan_bulan_ini, 0, ',', '.') : '0' }}
                    </div>

                    <div class="chart-number text-blue mb-2">
                        <small>Total Pemasukan Tahun Ini</small>
                        {{ $total_pemasukan_tahun_ini ? 'Rp ' . number_format($total_pemasukan_tahun_ini, 0, ',', '.') : '0' }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mengubah warna background widget secara periodik
            const colors = ['bg-danger', 'bg-warning', 'bg-success', 'bg-secondary'];
            let index = 0;

            setInterval(() => {
                const widget = document.getElementById('color-widget');
                if (widget) {
                    widget.classList.remove(...colors);
                    widget.classList.add(colors[index]);
                    index = (index + 1) % colors.length;
                }
            }, 1000);

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
                colors: ['#FF4560', '#008FFB'], // Warna garis grafik
                series: [{
                        name: 'Pengeluaran',
                        data: pengeluaranData
                    },
                    // {
                    //     name: 'Pemasukan',
                    //     data: pemasukanData
                    // }
                ],
                xaxis: {
                    type: 'datetime',
                    categories: dates,
                    labels: {
                        style: {
                            colors: '#FFFFFF' // Warna putih untuk label sumbu X
                        }
                    },
                    title: {
                        text: 'Tanggal',
                        style: {
                            color: '#FFFFFF' // Warna putih untuk teks judul sumbu X
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#FFFFFF' // Warna putih untuk label sumbu Y
                        }
                    },
                    title: {
                        text: 'Jumlah',
                        style: {
                            color: '#FFFFFF' // Warna putih untuk teks judul sumbu Y
                        }
                    }
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy'
                    }
                },
                grid: {
                    borderColor: '#FFFFFF', // Warna border grid jika diinginkan
                }
            };


            var chart = new ApexCharts(
                document.querySelector('#apex-area-chart'),
                options
            );

            chart.render();
        });
    </script>
@endpush
