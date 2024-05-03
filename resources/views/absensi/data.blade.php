<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-absensi">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal Masuk</th>
                    <th>Waktu Masuk </th>
                    <th>Status</th>
                    <th>Waktu Keluar</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($absensi  as $p)
            <tr>
                <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->namaKaryawan }}</td>
                <td>{{ $p->tanggalMasuk }}</td>
                <td>{{ $p->waktuMasuk }}</td>
                <td>{{ $p->status }}</td>
                <td>
                    @if ($p->namaKaryawan && $p->tanggalMasuk && $p->waktuMasuk && $p->status)
                        <button type="button" class="btn btn-primary" id="btnSelesai_{{ $p->id }}" onclick="tampilkanWaktu('{{ $p->id }}')">Selesai</button>
                    @else
                        <!-- Tampilkan pesan kosong jika input lain belum terisi -->
                        -
                    @endif
                </td>

                <script>
                    function tampilkanWaktu(id) {
                        // Dapatkan elemen tombol yang diklik
                        var tombol = document.getElementById("btnSelesai_" + id);

                        // Buat objek Date untuk mendapatkan waktu sekarang
                        var waktuSekarang = new Date();

                        // Dapatkan komponen waktu (jam, menit, detik)
                        var jam = waktuSekarang.getHours();
                        var menit = waktuSekarang.getMinutes();
                        var detik = waktuSekarang.getSeconds();

                        // Format waktu menjadi string yang sesuai
                        var waktuString = jam + ":" + menit + ":" + detik;

                        // Tambahkan waktu ke dalam tombol
                        tombol.innerText = waktuString;
                    }
                </script>
                <td>
                    <button class="btn text-warning" data-toggle="modal" data-target="#modalFormAbsensi" data-mode="edit"
                        data-id="{{ $p->id }}" data-namaKaryawan="{{ $p->namaKaryawan }}" data-tanggalMasuk="{{ $p->tanggalMasuk }}"  data-waktuMasuk="{{ $p->waktuMasuk }}"  data-status="{{ $p->status }}"  data-waktuKeluar="{{ $p->waktuKeluar }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('absensi.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger delete-data" data-namaKaryawan="{{ $p->namaKaryawan }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
        </table>
    </div>
</div>