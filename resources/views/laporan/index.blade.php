@extends('template/layout')

@section('content')
    <section class="content">
        <div class="right_col" role="main">
            <!-- /top tiles -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="dashboard_graph">
                        <div class="row x_title">
                            <div class="col-md-6">
                                <h3>
                                    PROJECT UJIKOM
                                    <h3>CHASIER GACORAN</h3>
                                </h3>
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
                        </div>
                        <div class="col-md-12 col-sm-3 bg-white">
                        <div class="x_title">
                        
                            <div class="row align-items-center">
                                <div class="col-md-12 text-center"> <!-- Bagian kanan -->
                                    <h3>Laporan</h3>
                                </div>
                                <form action="/laporanTransaksi" method="post" class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3"> <!-- Bagian kiri -->
                                            <div class="input-group">
                                                <input type="date" class="form-control" name="tgl_awal" placeholder="Tanggal Awal"/>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1 text-center"> <!-- Tengah -->
                                            <h4 class="my-0">S/D</h4>
                                        </div>
                                        <div class="col-md-3"> <!-- Tengah -->
                                            <div class="input-group">
                                                <input type="date" class="form-control" name="tgl_akhir" placeholder="Tanggal Akhir"/>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2"> <!-- Bagian kanan -->
                                            <div class="input-group">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-search"></i> Cari
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-3"> <!-- Bagian kanan -->
                                            <div class="input-group">
                                                <div class="float-right ml-auto">
                                                    <a href="{{ route('export-laporan')}}" class="btn btn-success">
                                                        <i class="fa fa-file-excel"></i> Export
                                                    </a>
                                                    <a href="{{ route('export-laporan-pdf')}}" class="btn btn-danger ml-2">
                                                        <i class="fa fa-file-pdf"></i> Export PDF
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                            <div class="card-body">
                                <div class="mt-3">
                                    @include('laporan.data')
                                </div>
                                <!-- Button trigger modal -->
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <br />
        </div>
    </section>
@endsection

@push('script')
    <script>
        $('#tbl-laporan').DataTable()
    </script>
@endpush
