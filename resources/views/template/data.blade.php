@extends('template/layout')

@push('style')
@endpush

@section('content')
<section class="content">
        <div class="right_col" role="main">
            <!-- /top tiles -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="dashboard_graph">
                        <div class="row x_title">
                            <div class="col-md-6">
                                <h1 style=" font-family: 'Caveat', cursive;">Silvi Caffe</h1>
                            </div>
                            <div class="col-md-6">
                                <div id="reportrange" class="pull-right"
                                    style="
                                    background: #fff;
                                    cursor: pointer;
                                    padding: 5px 10px;
                                    border: 1px solid #ccc;
                                ">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                    <span>December 30, 2014 - January 28, 2015</span>
                                    <b class="caret"></b>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-3 bg-white">
                                <div class="x_title">
                                <h2>Dashboard</h2>
                                    <div class="float-right ml-auto">
                                        
                                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modalFormJenis">
                                            Tambah Jenis
                                        </button>
                                        <a href="{{ route('export-jenis')}}" class="btn btn-success">
                                            <i class="fa fa-file-excel"></i> Export
                                        </a>
                                        <a href="{{ route('export-jenis-pdf')}}" class="btn btn-danger">
                                            <i class="fa fa-file-pdf"></i> Export PDF
                                        </a>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formImport">
                                            <i class="fas fa-file-excel"></i> Import
                                        </button> -->

                                        <form  style="display: flex; align-items: center;">
                                            <label for="tanggal_mulai" style="margin-right: 5px;">Dari Tanggal:</label>
                                                <input type="date" id="tanggal_mulai" name="tanggal_mulai"
                                                        style="width: 150px; margin-right: 10px;">

                                            <label for="tanggal_selesai" style="margin-right: 5px;">Sampai Tanggal:</label>
                                                <input type="date" id="tanggal_selesai" name="tanggal_selesai"
                                                    style="width: 150px; margin-right: 10px;">

                                        </form>

                                        <!-- <div class="col-md-6">
                                            <div class="tanggal m-2 ">

                                                <label for="tanggal_mulai">Tanggal Mulai:</label>
                                                <input type="date" id="tanggal_mulai" name="tanggal_mulai">

                                                <label for="tanggal_selesai">Tanggal Selesai:</label>
                                                <input type="date" id="tanggal_selesai" name="tanggal_selesai">

                                            </div>
                                        </div> -->
                                    </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            </ul>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" \
                                            aria-label="Close">
                                        </button>
                                    </div>
                                @endif
                                <div class="mt-3">
                                              <!-- top tiles -->
                                    <div class="tile_count">
                                        <div class="col-md-2 col-sm-4  tile_stats_count">
                                            <span class="count_top"> <i class="fa-solid fa-basket-shopping"></i>Jumlah Transaksi</span>
                                                <div class="count "></i>{{ $count_transaksi }}</div>
                                            <span class="count_bottom"><i class="green"></i></i>Transaksi</span>
                                        </div>
                                        <div class="col-md-1 col-sm-4 ">
                                        </div>
                                        <div class="col-md-2 col-sm-4  tile_stats_count">
                                            <span class="count_top"><i class="fa-solid fa-money-bill-1-wave"></i> Jumlah Pendapatan</span>
                                                <div class="count green ">{{ number_format($pendapatan, 2) }}</div>
                                            <span class="count_bottom"><i class="green"> </i> </span>
                                        </div>
                                        <div class="col-md-1 col-sm-4 ">
                                        </div>
                                        <div class="col-md-2 col-sm-4  tile_stats_count">
                                            <span class="count_top"><i class="fa-solid fa-utensils"></i> Jumlah Menu</span>
                                            <div class="count">{{ $count_menu }}</div>
                                            <span class="count_bottom"><i class="green"> </i> Menu Yang Tersedia </span>
                                        </div>
                                        <div class="col-md-1 col-sm-4 ">
                                            </div>
                                            <div class="col-md-2 col-sm-4  tile_stats_count">
                                                <span class="count_top"><i class="fa-solid fa-database"></i> Sisa stok</span>
                                                <div class="count">{{ $sisaStok }}</div>
                                                <span class="count_bottom"><i class="green"></i> Sisa Stok</span>
                                            </div>
                                            <div class="col-md-1 col-sm-4 ">
                                                </div>
                                            </br>
                                            <!-- <div class="col-md-3 col-sm-4  tile_stats_count">
                                                <span class="count_top"><i class="fa-regular fa-calendar-days"></i></i>Jumlah Transaksi Saat Ini</span>
                                                <div class="count">0</div>
                                        <span class="count_bottom"><i class="red"></i></i>Jumlah transaksi hari ini</span>
                                        </div> -->
                                            <!-- <div class="col-md-2 col-sm-4  tile_stats_count">
                                                <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
                                            <div class="count">2,315</div>
                                        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                                        </div> -->
                                            <!-- <div class="col-md-2 col-sm-4  tile_stats_count">
                                                <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
                                            <div class="count">7,325</div>
                                        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                                        </div> -->
                                        <!-- <div class="col-md-8 col-sm-6  ">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Grafik Penjualan</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#">Settings 1</a>
                                                            <a class="dropdown-item" href="#">Settings 2</a>
                                                        </div>
                                                    </li>
                                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <canvas id="mybarChart"></canvas>
                                                </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- <ul class="list-unstyled top_profiles scroll-view">
                                            @foreach ($pelanggan  as $p)
                                            <li class="media event">
                                                <a class="pull-left border-aero profile_thumb">
                                                    <i class="fa fa-user aero"></i>
                                                </a>
                                                <div class="media-body">
                                                    <a class="title" >{{ $p->nama }}</a>
                                                    <p><strong>{{ $p->email }}</strong> {{ $p->no_tlp }}</p>
                                                    <p> <small>{{ $p->alamat }}</small>
                                                </p>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>  -->
                                    <!-- <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>Pendapatan per Tanggal</h4>
                                                </div>
                                                <div class="card-body">
                                                    <canvas id="pendapatanPerTanggalChart" width="400" height="200"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-md-12 col-sm-5  ">
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
                                    </div>
                                    <div class="col-md-4 col-sm-5 ">
                                        <div class="x_panel tile fixed_height_330">
                                            <div class="x_title">
                                                <h2>Top 5 Penjualan</h2>
                                                <ul class="nav navbar-right panel_toolbox">
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                    @foreach ($most_ordered_menu as $menu => $count)
                                                        @php
                                                            // Temukan objek menu sesuai dengan nama_menu
                                                            $menuObject = \App\Models\Menu::where('nama_menu', $menu)->first();
                                                        @endphp
                                                        @if ($menuObject)
                                                            <div class="d-flex align-items-center mb-2">
                                                                <!-- Gunakan URL yang sesuai untuk mengakses gambar -->
                                                                <img src="{{ asset('images/' . $menuObject->image) }}"
                                                                    alt="{{ $menuObject->nama_menu }}" class="mr-2"
                                                                    style="width: 50px; height: 50px;">
                                                                <p>{{ $menuObject->nama_menu }}: {{ $count }}</p>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                            </div>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 col-sm-5 ">
                                        <div class="x_panel tile fixed_height_330">
                                            <div class="x_title">
                                                <h2>Transaksi Terbaru</h2>
                                                <ul class="nav navbar-right panel_toolbox">
                                                    </ul>
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
                                        </ul>
                                    </div>
                                    <div class="col-md-4 col-sm-5 ">
                                        <div class="x_panel tile fixed_height_330">
                                            <div class="x_title">
                                                <h2>Stok Ter Rendah</h2>
                                                <ul class="nav navbar-right panel_toolbox">
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                @foreach ($stokTerendah as $stok)
                                                    <img src="{{ asset('images/' . $stok->menu->image) }}"
                                                        alt="{{ $stok->menu->nama_menu }}" class="mr-3"
                                                        style="width: 50px; height: 50px;">
                                                        <p> {{ $stok->menu->nama_menu }} </p> 
                                                        <p> Jumlah: {{ $stok->jumlah }}  </p>
                                                @endforeach
                                            </div>
                                        </ul>
                                    </div>
                                    <!-- Button trigger modal -->
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- include -->
    </section>
    <!-- include -->
@endsection

@push('script')
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
        integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script>
        var ctx = document.getElementById('pendapatanPerTanggalChart').getContext('2d');
        var pendapatanPerTanggalChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode(array_keys($totalPendapatanPerHari)) !!},
                datasets: [{
                    label: 'Pendapatan Per Hari',
                    data: {!! json_encode(array_values($totalPendapatanPerHari)) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgb(0, 123, 255)',
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        $('#tanggal_mulai, #tanggal_selesai').change(function() {
            var tanggalMulai = $('#tanggal_mulai').val();
            var tanggalSelesai = $('#tanggal_selesai').val();
            $.ajax({
                url: '/get-chart-data',
                type: 'GET',
                data: {
                    tanggal_mulai: tanggalMulai,
                    tanggal_selesai: tanggalSelesai
                },
                success: function(data) {
                    pendapatanPerTanggalChart.data.labels = Object.keys(data);
                    pendapatanPerTanggalChart.data.datasets[0].data = Object.values(data);
                    pendapatanPerTanggalChart.update();

                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>
@endpush