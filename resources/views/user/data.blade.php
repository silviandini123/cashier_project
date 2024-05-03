<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-usermanager">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($usermanager  as $p)
            <tr>
                <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->email }}</td>
                <td>
                    <button class="btn text-warning" data-toggle="modal" data-target="#modalFormUserManager" data-mode="edit"
                        data-id="{{ $p->id }}" data-name="{{ $p->name }}" data-email="{{ $p->email }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('user.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger delete-data" data-nama="{{ $p->name }}">
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