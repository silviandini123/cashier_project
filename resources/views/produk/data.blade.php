<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-produk">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Nama Supplier</th>
                    <th>Harga Beli </th>
                    <th>Harga Jual </th>
                    <th>Stok </th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($produk_titipan  as $p)
            <tr>
                <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>{{ $p->nama_suplier }}</td>
                <td>{{ $p->harga_beli }}</td>
                <td>{{ $p->harga_jual }}</td>
                <td>{{ $p->stok }}</td>
                <td>{{ $p->keterangan }}</td>
                <td>
                    <button class="btn text-warning" data-toggle="modal" data-target="#modalFormMenu" data-mode="edit"
                        data-id="{{ $p->id }}" data-produk_id="{{ $p->produk_id }}" data-nama_produk="{{ $p->nama_produk }}" data-nama_supplier="{{ $p->nama_supllier }}" data-harga_beli="{{ $p->harga_beli }}" data-harga_jual="{{ $p->harga_jual }}" data-stok="{{ $p->keterangan }}" data-keterangan="{{ $p->keterangan }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('produk_titipan.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger delete-data" data-nama="{{ $p->nama_produk }}">
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