@extends('template/layout')

@push('style')
    <!-- Tambahkan style khusus di sini jika diperlukan -->
@endpush

@section('content')
    <section class="content">
        <div class="right_col" role="main">
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
                        </div>

                        <!-- Daftar orderan yang sedang diproses -->
                        <div class="row">
                            {{-- <div class="col-md-8">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Daftar Menu</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <!-- Tabel daftar orderan -->

                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-md-7">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Daftar Menu</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <!-- Tabel daftar orderan -->
                                        <ul class="menu-container">
                                        @foreach ($jenis as $j)
                                            <li class="jenis-menu" style=" font-family: 'Caveat', cursive;" data-jenis="{{ $j}}">
                                                <h3>{{ $j->nama_jenis }}</h3>
                                                <li style="overflow:auto">
                                                    <ul class="menu-item" class="col-md-8" style="cursor: pointer;">
                                                        @foreach ($j->menu as $menu)
                                                            <li @if (!isset($menu->stok) || $menu->stok->count() < 1 || $menu->stok->jumlah < 1) style="pointer-events: none; opacity: .8" @endif
                                                                data-harga="{{ $menu->harga }}" data-id="{{ $menu->id }}" data-image="{{ $menu->image }}">
                                                                <img src="{{ asset('images') }}/{{ $menu->image }}" alt="{{ $menu->nama_menu }}" style="width: 50px; display: flex; justify-content: center; align-items: center;">
                                                                <div style="font-family: calibri;">
                                                                    Nama: {{ $menu->nama_menu }}<br>
                                                                    @if (isset($menu->stok) && $menu->stok->count() > 0 && $menu->stok->jumlah > 0)
                                                                        Stok: {{ $menu->stok->jumlah }}<br>
                                                                    @else
                                                                        Stok tidak tersedia<br>
                                                                    @endif
                                                                    Deskripsi: {{ $menu->deskripsi }}
                                                                </div>
                                                            </li>   
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <style>
                                .ordered-item {
                                    display: flex;
                                    align-items: center;
                                    justify-content: space-between;
                                    padding: 10px;
                                    margin-bottom: 10px;
                                    background-color: #f9f9f9;
                                    border-radius: 5px;
                                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                }

                                .ordered-item-container {
                                    display: flex;
                                    align-items: center;
                                }

                                .ordered-item-image {
                                    width: 50px;
                                    margin-right: 10px;
                                }

                                .ordered-item-details {
                                    flex: 1;
                                }

                                .ordered-item-name {
                                    margin: 0;
                                    font-size: 16px;
                                    font-weight: bold;
                                }

                                .ordered-item-price {
                                    margin: 5px 0;
                                    font-size: 14px;
                                    color: #666;
                                }

                                .ordered-item-actions {
                                    display: flex;
                                    align-items: center;
                                }

                                .qty-item {
                                    width: 40px;
                                    text-align: center;
                                    margin: 0 5px;
                                    border: 1px solid #ccc;
                                    border-radius: 3px;
                                }

                                .subtotal {
                                    margin: 0;
                                    font-size: 18px;
                                    font-weight: bold;
                                    color: #007bff;
                                }

                                .remove-item,
                                .btn-dec,
                                .btn-inc {
                                    background-color: #dc3545;
                                    color: #fff;
                                    border: none;
                                    border-radius: 3px;
                                    cursor: pointer;
                                    padding: 5px 10px;
                                    margin-left: 5px;
                                }

                                .remove-item:hover,
                                .btn-dec:hover,
                                .btn-inc:hover {
                                    background-color: #c82333;
                                }

                                .pagetitle {
                                    text-align: center;
                                    /* Pusatkan teks */
                                    margin-bottom: 20px;
                                    /* Berikan ruang bawah */
                                }

                                .pagetitle h1 {
                                    font-size: 30px;
                                    /* Ukuran font yang lebih besar */
                                    color: #333;
                                    /* Warna teks */
                                    text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
                                    /* Bayangan teks */
                                }

                                .menu-container li h3:hover {
                                    background-color: lightblue;
                                    /* Mengubah warna latar belakang saat hover */
                                }
                                
                                /* Style untuk item menu */
                                .menu-item li {
                                    cursor: pointer;
                                    text-align: center;
                                    margin-bottom: 10px;
                                    padding: 10px;
                                    border: 1px solid #ccc;
                                    border-radius: 5px;
                                    transition: all 0.3s ease;
                                }

                                .menu-item li:hover {
                                    background-color: #f0f0f0;
                                }

                                /* Style untuk tombol hapus dan tombol kuantitas */
                                .btn-dec,
                                .btn-inc {
                                    background-color: #2A3F54;
                                    color: #fff;
                                    border: none;
                                    border-radius: 3px;
                                    cursor: pointer;
                                    padding: 5px 10px;
                                    margin-left: 5px;
                                    transition: all 0.3s ease;
                                }

                                .remove-item {
                                    color: #fff;
                                    border: none;
                                    border-radius: 3px;
                                    cursor: pointer;
                                    padding: 5px 10px;
                                    margin-left: 5px;
                                    transition: all 0.3s ease;
                                }

                                .btn-dec:hover,
                                .btn-inc:hover {
                                    background-color: #a4cffd;
                                }

                                /* Style untuk subtotal */
                                .subtotal {
                                    font-size: 16px;
                                    font-weight: bold;
                                    color: #007bff;
                                    margin-left: 10px;
                                }

                                /* Style untuk input kuantitas */
                                .qty-item {
                                    width: 50px;
                                    text-align: center;
                                    margin: 0 5px;
                                }

                                /* Style untuk total */
                                #total {
                                    font-size: 18px;
                                    font-weight: bold;
                                    color: #28a745;
                                    margin-top: 10px;
                                }

                                .main {
                                    display: flex;
                                    gap: 2rem;
                                }



                                .c {
                                    width: 700px;
                                    display: flex;
                                    flex-direction: column;
                                }

                                .container {
                                    border: 2px ;
                                    border-radius: 2px;
        
                                    /* Menambahkan sedikit efek rounded pada border */
                                 x-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                    /* Menambahkan bayangan */
                                    display: grid;
                                    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                                    gap: 30px;
                                    transition: box-shadow 0.3s;
                                    /* Efek transisi untuk bayangan */
                                }   bo

                                .container:hover {
                                    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                                    /* Meningkatkan bayangan saat hover */
                                }



                                .item-content {
                                    width: 400px;
                                }

                                .menu-container {
                                    padding: 0px;
                                    text-align: center;
                                    list-style-type: none;
                                }

                                .menu-container li h3 {
                                    text-transform: uppercase;    /* Memberikan sedikit efek rounded */
                                    background-color: aliceblue;
                                    transition: background-color 0.3s;
                                    /* Efek transisi ketika hover */
                                }

                                .menu-item {
                                    list-style-type: none;
                                    display: flex; 
                                    gap: 1em;
                                }

                                .menu-item li {
                                    display: flex;
                                    flex-direction: column;
                                    padding: 10px 20px;

                                }

                                .item.content {
                                    text-align: center;
                                    /* Pusatkan konten */
                                    margin-top: 72px;
                                }

                                .card {
                                    width: 400px;
                                    margin: auto;
                                    background-color: #f9f9f9;
                                    /* Warna latar belakang */
                                    border-radius: 10px;
                                    /* Efek rounded pada card */
                                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                    /* Bayangan */
                                    transition: box-shadow 0.3s;
                                    /* Efek transisi saat hover */
                                }

                                .card:hover {
                                    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                                    /* Meningkatkan bayangan saat hover */
                                }

                                .card-body {
                                    padding: 20px;
                                }

                                .card-title {
                                    font-size: 24px;
                                    /* Ukuran font yang lebih besar */
                                    color: #333;
                                    /* Warna teks */
                                    margin-bottom: 15px;
                                    /* Ruang bawah */
                                }

                                .ordered-list {
                                    list-style: none;
                                    /* Menghapus bullet points */
                                    padding: 0;
                                }

                                .card-text {
                                    font-size: 18px;
                                }

                                .btn-bayar {
                                    background-color: #007bff;
                                    /* Warna latar belakang tombol */
                                    color: #fff;
                                    /* Warna teks tombol */
                                    border: none;
                                    border-radius: 5px;
                                    padding: 10px 20px;
                                    cursor: pointer;
                                    display: inline-block;
                                    /* Mengatur tata letak tombol */
                                    /* Anda dapat menyesuaikan properti CSS lainnya sesuai kebutuhan */
                                }


                                .btn-bayar:hover {
                                    background-color: #0056b3;
                                    /* Warna latar belakang tombol saat hover */
                                }
                            </style>
        
                            <div class="col-md-5">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Payment</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <!-- <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Tanggal</label>
                                            <div class="col-sm-8">
                                                <input id="birthday" class="form-control" placeholder="dd-mm-yyyy" type="date">
                                            </div>
                                        </div> -->
                                        <ul class="ordered-list">

                                        </ul>
                                        Total Bayar : <h2 id="total"> 0</h2>
                                        <!-- <div class="form-group row">
                                            <label for="Pelanggan" class="col-sm-4 col-form-label">Pelanggan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="nama" value="" name="nama">
                                            </div>
                                        </div> -->
                                        <br />
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">
                                                <button id="btn-bayar" type="submit" class="col-sm-12 btn btn-primary">Bayar</button>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br />
        </div>
    </section>
@endsection

@push('script')
    <script>
          $(function() {
            // Inisialisasi
            const orderedList = [];
            let total = 0;

            const sum = () => {
                return orderedList.reduce((accumulator, object) => {
                    return accumulator + (object.harga * object.qty);
                }, 0);
            };

            const changeQty = (el, inc) => {
                // Ubah di array
                const id = $(el).closest('li')[0].dataset.id;
                const index = orderedList.findIndex(list => list.menu_id == id);
                orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc;

                // Ubah qty dan ubah subtotal

                const txt_subtotal = $(el).closest('li').find('.subtotal')[0];
                const txt_qty = $(el).closest('li').find('.qty-item')[0];
                txt_qty.value = parseInt(txt_qty.value) == 1 && inc == -1 ? 1 : parseInt(txt_qty.value) + inc;
                txt_subtotal.innerHTML = orderedList[index].harga * orderedList[index].qty;

                // Ubah jumlah total
                $('#total').html(sum());
            };

            // Events
            $('.ordered-list').on('click', '.btn-dec', function() {
                changeQty(this, -1);
            });

            $('.ordered-list').on('click', '.btn-inc', function() {
                changeQty(this, 1); // Perbaiki parameter di sini
            });

            $('.ordered-list').on('click', '.remove-item', function() {
                const item = $(this).closest('li')[0];
                let index = orderedList.findIndex(list => list.id == parseInt(item.dataset.id));
                orderedList.splice(index, 1);
                $(this).closest('li').remove(); // Perbaiki pemanggilan remove
                $('#total').html(sum());
            });

           $('#btn-bayar').on('click', function() {
                $.ajax({
                    url: "{{ route('transaksi.store') }}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "orderedList": orderedList,
                        "total": sum()
                    },
                    success: function(data) {
                        console.log(data)
                        if (data.status) {
                            Swal.fire({
                                title: data.message,
                                showDenyButton: true,
                                confirmButtonText: "Cetak Nota",
                                denyButtonText: `OK`,
                                showCloseButton: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.open("{{ url('nota') }}/" + data.notrans);
                                    location.reload();
                                } else if (result.isDenied) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire('Pemesanan Gagal!', '', 'error');
                        }
                    },
                    error: function(error) {
                        console.log(error);
                        Swal.fire('Pemesanan Gagal!', '', 'error');
                    }
                });
            });

            $(".menu-item li").click(function() {
                // Mengambil data
                const menu_clicked = $(this).text();
                const data = $(this)[0].dataset;
                const harga = parseFloat(data.harga);
                const id = parseInt(data.id);
                const image = data.image;

                if (orderedList.every(list => list.menu_id !== id)) {
                    let dataN = {
                        'menu_id': id,
                        'menu': menu_clicked,
                        'harga': harga,
                        'qty': 1
                    };
                    orderedList.push(dataN);
                    let listOrder = `<li data-id="${id}" data-image="${image} data-id="${id}"><div><h4>${menu_clicked}</h4><img style="width:14%;" src="{{ asset('images') }}/${image}"></div>`;
                    listOrder += `Sub Total : Rp. ${harga}`;
                    listOrder += `<button class='remove-item'>hapus</button>
                           <button class="btn-dec"> - </button>`;
                    listOrder += `<input class="qty-item"
                                  type="number"
                                  value="1"
                                  style="width:35px"
                                  readonly
                              />
                              <button class="btn-inc">+</button><h2>
                              <span class="subtotal">${harga * 1}</span>
                          </li>`;
                    $('.ordered-list').append(listOrder);
                }
                $('#total').html(sum());
            });
        });
    </script>
@endpush
