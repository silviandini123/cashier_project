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
                                    <!-- include -->
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
        <!-- include -->
    </section>
    <!-- include -->
@endsection

@push('script')
    <script>
        $('#tbl-jenis').DataTable()
    </script>
@endpush