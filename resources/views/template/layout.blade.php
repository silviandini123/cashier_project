<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>P R O J E C T</title>

    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('sweetalert') }}/dist/sweetalert2.min.css" rel="stylesheet">

    <link href="{{ asset('template') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('template') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('template') }}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('template') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('template') }}/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
        rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('template') }}/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('template') }}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('template') }}/build/css/custom.min.css" rel="stylesheet">
    <link href="{{ asset('bootstrap5') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <!-- Custom Font Style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">
    
    @stack('style')
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a class="site_title" style=" font-family: 'Caveat', cursive;"><i class="fa-solid fa-mug-saucer"></i> <span>Silvi  Caffe</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="s.png" class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome To,</span>
                            <h2>C A F F E</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Silvi Andini</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> HOME <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <!-- <li><a href="{{ url('/dashboard') }}">Dashboard</a></li> -->
                                        <li><a href="{{ url('/data') }}">Data</a></li>
                                        <!-- <li><a href="{{ url('/sejarah') }}">Sejarah</a></li>
                                        <li><a href="{{ url('/contact') }}">Contact</a></li> -->
                                    </ul>
                                </li>
                            @if (Auth::user()->level == 1)
                                <li><a><i class="fa fa-user"></i> ADMIN <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <!-- <li><a href="{{ url('/contact') }}">Concact</a></li> -->
                                        <li><a href="{{ url('/jenis') }}">Jenis</a></li>
                                        <li><a href="{{ url('/menu') }}">Menu</a></li>
                                        <li><a href="{{ url('/stok') }}">Stok</a></li>
                                        <li><a href="{{ url('/user') }}">User Manager</a></li> 
                                        <li><a href="{{ url('/meja') }}">Meja</a></li>
                                        <li><a href="{{ url('/category') }}">Category</a></li> 
                                        <!-- <li><a href="{{ url('/absensi') }}">Absensi</a></li> -->
                                    </ul>
                                </li>
                            @endif
                            @if (Auth::user()->level == 2)
                                <li><a><i class="fa-solid fa-cash-register"></i> CASHIER <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('/pelanggan') }}">Pelanggan</a></li>
                                        <li><a href="{{ url('/pemesanan') }}">Pemesanan</a></li>
                                        <!-- <li><a href="{{ url('/sejarah') }}">sejarah</a></li> -->
                                        <!-- <li><a href="{{ url('/titipan') }}">produk Titipan</a></li> -->
                                    </ul>
                                </li>
                            @endif
                            @if (Auth::user()->level == 3)
                                <li><a href="{{ url('/laporan') }}"><i class="fa-solid fa-database"></i> OWNER <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <!-- <li><a href="{{ url('/categor') }}">Category</a></li> -->
                                        <li><a href="{{ url('/laporan') }}">Laporan</a></li>
                                    </ul>
                                </li>
                            @endif
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('logout') }}">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            @yield('content')
            <!-- /page content -->

            <!-- footer content -->
            @include('template/footer')