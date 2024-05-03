<!DOCTYPE html>
<html>
<head>
<style>
    #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #435ebe;
    color: white;
    text-align: center;
    }

    h1{
        text-align: center;
    }
</style>
</head>
<body>

<h1>Absensi</h1>
<table id="customers">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal masuk</th>
        <th>Waktu masuk</th>
        <th>Status</th>
        <th>Keluar</th>
    </tr>
    @php
        $no = 1;
    @endphp
    @foreach ($absensi as $p)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $p->namaKaryawan }}</td>
        <td>{{ $p->tanggalMasuk }}</td>
        <td>{{ $p->waktuMasuk }}</td>
        <td>{{ $p->status }}</td>
        <td>{{ $p->waktuKeluar }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>