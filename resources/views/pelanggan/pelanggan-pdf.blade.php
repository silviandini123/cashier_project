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

<h1>Data Pemesanan</h1>
<table id="customers">
    <tr>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Email </th>
        <th>No Telp </th>
        <th>Alamat </th>
    </tr>
    @php
        $no = 1;
    @endphp
    @foreach ($pelanggan as $p)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $p->nama_pelanggan }}</td>
        <td>{{ $p->email }}</td>
        <td>{{ $p->no_telp }}</td>
        <td>{{ $p->alamat }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>