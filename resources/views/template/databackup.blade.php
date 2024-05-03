@extends('template/layout')

@push('style')
<style>
    .tile_count {
        margin-bottom: 20px;
    }

    .tile_stats_count {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 15px;
    }

    .tile_stats_count .count_top {
        font-weight: bold;
    }

    .tile_stats_count .count p {
        margin: 5px 0;
    }

    .tile_stats_count .count p:last-child {
        margin-bottom: 0;
    }

    .tile_stats_count .count p i {
        margin-right: 5px;
    }
</style>
@endpush

@section('content')
<section class="content">
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="dashboard_graph">
                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>PROJECT UJIKOM</h3>
                            <h3>CHASIER GACORAN</h3>
                        </div>
                        <div class="col-md-6">
                            <div id="reportrange" class="pull-right">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>December 30, 2014 - January 28, 2015</span>
                                <b class="caret"></b>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-white">
                        <div class="col-md-12 col-sm-3">
                            <div class="x_title">
                                <h2>Dashboard</h2>
                                <div class="float-right ml-auto">
                                    <div class="card bg-white p-4">
                                        <form method="GET" action="{{ route('chart.index') }}">
                                            <div class="form-group">
                                                <label for="tanggal">Filter berdasarkan Tanggal:</label>
                                                <input type="date" id="tanggal" name="tanggal" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                            <a href="{{ url('dashboard') }}" class="btn btn-primary">Refresh</a>

                                            {{-- <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <div style="display: flex; align-items: center;">
                                                    <form action="{{ url('/') }}" method="GET" style="display: flex; align-items: center;">
                                                        <label for="tanggal_awal" style="margin-right: 5px;">Dari Tanggal:</label>
                                                        <input type="date" class="form-control" id="tanggal_awal"
                                                            value="{{ $tanggal_awal ?? '' }}" name="tanggal_awal"
                                                            style="width: 150px; margin-right: 10px;">
                            
                                                        <label for="tanggal_akhir" style="margin-right: 5px;">Sampai Tanggal:</label>
                                                        <input type="date" class="form-control" id="tanggal_akhir"
                                                            value="{{ $tanggal_akhir ?? '' }}" name="tanggal_akhir"
                                                            style="width: 150px; margin-right: 10px;">
                            
                                                        <button type="submit" class="btn btn-primary">Filter</button> --}}
                                        </form>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif

                                @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                                <div class="mt-3">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-6">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Bar graph <small>Sessions</small></h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <canvas id="pendapatanPerTanggalChart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-5">
                                            <div class="x_panel tile fixed_height_330">
                                                <div class="x_title">
                                                    <h2>Stok Ter Rendah</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                @foreach ($stokTerendah as $stok)
                                                <div class="d-flex align-items-center mb-2">
                                                    <img src="{{ asset('images/' . $stok->menu->image) }}" alt="{{ $stok->menu->nama_menu }}" class="mr-3" style="width: 50px; height: 50px;">
                                                    <div>
                                                        <p> {{ $stok->menu->nama_menu }} </p>
                                                        <p> Jumlah: {{ $stok->jumlah }} </p>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-5">
                                            <div class="x_panel tile fixed_height_330">
                                                <div class="x_title">
                                                    <h2>Top 5 Penjualan</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                @foreach ($most_ordered_menu as $menu => $count)
                                                @php
                                                // Temukan objek menu sesuai dengan nama_menu
                                                $menuObject = \App\Models\Menu::where('nama_menu', $menu)->first();
                                                @endphp
                                                @if ($menuObject)
                                                <div class="d-flex align-items-center mb-2">
                                                    <img src="{{ asset('images/' . $menuObject->image) }}" alt="{{ $menuObject->nama_menu }}" class="mr-2" style="width: 50px; height: 50px;">
                                                    <div>
                                                        <p>{{ $menuObject->nama_menu }}</p>
                                                        <p>{{ $count }}</p>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-5">
                                            <div class="x_panel tile fixed_height_330">
                                                <div class="x_title">
                                                    <h2>Transaksi Terbaru</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                @foreach ($latest_transactions as $transaction)
                                                <li class="list-group-item">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p>{{ $transaction->created_at }}</p>
                                                        <p>Total: Rp{{ $transaction->subtotal }}</p>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script>
    $('#tbl-jenis').DataTable()
    window.onload = function() {
        var dataPenjualan = [];
        var dataJmlTransaksi = [];

        var chart;

        $.get("{{ url('data_penjualan')}}/0", function(data) {
            $.each(data, function(key, value) {
                let dat = value['tanggal'];
                let year = dat.substring(0, 4);
                let month = dat.substring(5, 7) - 1;
                let day = dat.substring(8, 10);
                dataPenjualan.push({
                    x: new Date(year, month, day),
                    y: parseInt(value['total_bayar'])
                });

                dataJmlTransaksi.push({
                    x: new Date(year, month, day),
                    y: parseInt(value['jumlah'])
                });
            });

            chart = new CanvasJS.Chart("chart", {
                title: {
                    text: "Grafik Pendapatan"
                },
                axisY: {
                    title: "Penjualan",
                    lineColor: "#C24642",
                    tickColor: "#C24642",
                    labelFontColor: "#C24642",
                    titleFontColor: "#C24642",
                    includeZero: true,
                    suffix: ""
                },
                axisY2: {
                    title: "Pendapatan",
                    lineColor: "#7F6084",
                    tickColor: "#7F6084",
                    labelFontColor: "#7F6084",
                    titleFontColor: "#7F6084",
                    includeZero: true,
                    prefix: "",
                    suffix: ""
                },
                toolTip: {
                    shared: true
                },
                legend: {
                    cursor: "pointer",
                    itemclick: toggleDataSeries
                },
                data: [{
                        type: "line",
                        name: "Penjualan",
                        color: "#C24642",
                        axisYIndex: 0,
                        showInLegend: true,
                        dataPoints: dataJmlTransaksi
                    },
                    {
                        type: "line",
                        name: "Pendapatan",
                        color: "#7F6084",
                        axisYType: "secondary",
                        showInLegend: true,
                        dataPoints: dataPenjualan
                    }
                ]
            });
            chart.render();
            updateChart();
        });

        function updateChart() {
            $.get("{{ url('data_penjualan')}}/" + dataJmlTransaksi.length, function(data) {
                $.each(data, function(key, value) {
                    let date = value['tanggal'];
                    let year = date.substring(0, 4);
                    let month = date.substring(5, 7) - 1;
                    let day = date.substring(8, 10);
                    dataPenjualan.push({
                        x: new Date(year, month, day),
                        y: parseInt(value['total_bayar'])
                    });

                    if (dataPenjualan.length == 1)
                        dataJmlTransaksi.pop({
                            x: new Date(year, month, day),
                            y: parseInt(value['jumlah'])
                        });
                    else
                        dataJmlTransaksi.push({
                            x: new Date(year, month, day),
                            y: parseInt(value['jumlah'])
                        });

                });
            });
            chart.render();
            setTimeout(function() {
                updateChart()
            }, 10000);
        }

        function toggleDataSeries(e) {
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            e.chart.render();
        }

    }
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Mendapatkan data pendapatan per tanggal dari PHP
    var pendapatanPerTanggalData = {!! $pendapatan_per_tanggal !!};
    // Memformat data untuk Chart.js
    var labels = [];
    var data = [];
    pendapatanPerTanggalData.forEach(function(item) {
        labels.push(item.tanggal);
        data.push(item.total_pendapatan);
    });

    // Menggambar grafik pendapatan per tanggal
    var ctx = document.getElementById('pendapatanPerTanggalChart').getContext('2d');
    var pendapatanPerTanggalChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pendapatan per Tanggal',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endpush
