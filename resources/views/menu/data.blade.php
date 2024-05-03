<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-menu">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Jenis Id</th>
                    <th>Harga </th>
                    <th>Image </th>
                    <th>Deskripsi </th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($menu  as $p)
            <tr>
                <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nama_menu }}</td>
                <td>{{ $p->jenis->nama_jenis }}</td>
                <td>{{ $p->harga }}</td>
                @if (request()->route()->getActionMethod() == 'generatepdf')
                    <td><img width="70px" src="data:image/jpeg;base64,{{ $p->imageData }}" alt=""></td>
                @else
                    <td><img width="70px" src="{{ asset('images/' . $p->image) }}" alt=""></td>
                @endif
                <td>{{ $p->deskripsi }}</td>
                <td>
                    <button class="btn text-warning" data-toggle="modal" data-target="#modalFormMenu" data-mode="edit"
                        data-id="{{ $p->id }}" data-jenis_id="{{ $p->jenis_id }}" data-nama_menu="{{ $p->nama_menu }}" data-harga="{{ $p->harga }}" data-image="{{ $p->image }}" data-deskripsi="{{ $p->deskripsi }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('menu.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger delete-data" data-nama="{{ $p->nama_menu }}">
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