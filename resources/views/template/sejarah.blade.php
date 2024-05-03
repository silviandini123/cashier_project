@extends('template/layout')

@push('style')
    <style>
        .section-title {
            margin-bottom: 30px;
        }

        .history {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .history h4 {
            margin-top: 0;
            color: #333333;
        }

        .history ul {
            list-style-type: none;
            padding: 0;
        }

        .history ul li {
            margin-bottom: 15px;
            line-height: 1.6;
            color: #666666;
        }

        .history ul li strong {
            font-weight: bold;
            color: #007bff;
        }

        .section-title h3 {
            margin-bottom: 20px;
            color: #333333;
            font-size: 26px;
            text-align: center;
        }

        .section-title p {
            margin-bottom: 30px;
            color: #666666;
            font-size: 16px;
            text-align: center;
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
                            <div class="col-md-6 text-center">
                                <h3>T E N T A N G  A P L I K A S I</h3>
                            </div>
                            <div class="col-md-12 col-sm-3 bg-white">
                                <div class="x_title">
                                    <div class="clearfix"></div>
                                </div>

                                <div class="history">
                                    <div class="section-title">
                                        <h3>Tentang</h3>
                                    </div>
                                    <p>Aplikasi ini dirancang untuk membantu bisnis dalam melakukan manajemen transaksi 
                                        penjualan dan pembayaran. Aplikasi ini biasanya digunakan di berbagai jenis 
                                        usaha ritel, restoran, kafe, atau layanan jasa lainnya untuk mencatat, mengelola, dan melacak semua 
                                        aktivitas penjualan.
                                    </p>
                                    <div class="section-title">
                                        <h3>Layanan Aplikasi</h3>
                                    </div>
                                    <p>Pencatatan Transaksi: Aplikasi ini memungkinkan pengguna untuk mencatat semua transaksi penjualan, baik itu pembelian produk maupun layanan, beserta detailnya seperti item yang dibeli, harga, jumlah, dan total pembayaran.
                                        Manajemen Stok: Aplikasi kasir membantu pengguna dalam mengelola stok produk dengan menyediakan fitur untuk memantau persediaan barang, melakukan penyesuaian stok, serta memberikan notifikasi ketika stok mencapai batas tertentu.
                                        Pembayaran dan Checkout: Aplikasi ini menyediakan fitur pembayaran yang beragam, mulai dari tunai, kartu kredit/debit, hingga pembayaran digital seperti e-wallet atau transfer bank. Pengguna juga dapat mencetak atau mengirimkan struk pembayaran kepada pelanggan.
                                        Laporan Penjualan: Aplikasi kasir dapat menghasilkan laporan penjualan secara berkala atau real-time, yang berisi informasi tentang total penjualan, omset, produk terlaris, dan lain sebagainya. Laporan ini membantu pengguna dalam menganalisis kinerja bisnis dan membuat keputusan strategis.
                                    </p>
                                    <div class="section-title">
                                        <h3>Sejarah Pembuatan</h3>
                                    </div>
                                    <ul>
                                        <li><strong>2020:</strong> Aplikasi ini pertama kali dikembangkan oleh Bayu Aditia Suherman Di SMKN 1 Cianjur.</li>
                                        <li><strong>2021:</strong> Dilakukan peluncuran versi beta aplikasi untuk pengguna internal perusahaan.</li>
                                        <li><strong>2022:</strong> Aplikasi diluncurkan secara publik ke Google Play Store dan Apple App Store.</li>
                                        <li><strong>2023:</strong> Terjadi pembaruan besar-besaran pada antarmuka pengguna untuk meningkatkan pengalaman pengguna.</li>
                                        <li><strong>2024:</strong> Integrasi dengan platform media sosial dilakukan untuk meningkatkan konektivitas pengguna.</li>
                                        <li><strong>Saat Ini:</strong> Tim pengembang terus melakukan pembaruan rutin untuk meningkatkan fungsionalitas dan stabilitas aplikasi.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
