@extends('template/layout1')

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
                                <h3>
                                    PROJECT UJIKOM
                                    <h3>KASIR</h3>
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
                                            <li>
                                                <h3>{{ $j->nama_jenis }}</h3>
                                                <ul class="menu-item" style="cursor: pointer;">
                                                    @foreach ($j->menu as $menu)
                                                        <li data-harga="{{ $menu->harga }}" data-id="{{ $menu->id }}">
                                                            <img width="50px" src="{{ asset('images') }}/{{ $menu->image }}"
                                                                alt="">
                                                            <div>
                                                                Nama: {{ $menu->nama_menu }}
                                                                <br>
                                                                Jumlah: {{ $menu->stok->jumlah }}
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
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
                const index = orderedList.findIndex(list => list.id == id);
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
                    url: "{{ route('pemesanan.store') }}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        orderedList: orderedList,
                        total: sum()
                    },
                    success: function(data) { // Perbaiki pengejaan di sini
                        console.log(data);
                        Swal.fire({
                            title: data.message,
                            showDenyButton: true,
                            confirmButtonText:"Cetak Nota",
                            denyButtonText: OK
                        }).then((result) => {
                            if (result.isConfirmed){
                                window.open("{{ url('nota/2343423') }}")
                                location.reload()
                            }else if(result.isDenied){
                                location.reload()
                            }
                        });
                    },
                    error:function (request, status, error) {
                        console.log(status, error)
                        Swal.fire('Pemesanan Gagal!')
                    }
                });
            });

            $(".menu-item li").click(function() {
                // Mengambil data
                const menu_clicked = $(this).text();
                const data = $(this)[0].dataset;
                const harga = parseFloat(data.harga);
                const id = parseInt(data.id);

                if (orderedList.every(list => list.id !== id)) {
                    let dataN = {
                        'id': id,
                        'menu': menu_clicked,
                        'harga': harga,
                        'qty': 1
                    };
                    orderedList.push(dataN);
                    let listOrder = <li data-id="${id}"><h3>${menu_clicked}</h3>;
                    listOrder += Sub Total : Rp. ${harga};
                    listOrder += `<button class='remove-item'>hapus</button>
                           <button class="btn-dec"> - </button>`;
                    listOrder += `<input class="qty-item"
                                  type="number"
                                  value="1"
                                  style="width:30px"
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
<style>
    .menu-container li h3 {
        text-transform: uppercase;
        font-weight: bold;
        font-size: 18px;
        background-color: aliceblue;
        padding: 5px 15px;
        /* 10px; */
    }
</style>