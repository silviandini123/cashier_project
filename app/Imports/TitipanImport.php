<?php

namespace App\Imports;

use App\Models\Titipan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TitipanImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Titipan::create([
                'nama_produk' => $row['nama_produk'],
                'nama_supplier' => $row['nama_supplier'],
                'harga_beli' => $row['harga_beli'],
                'harga_jual' => $row['harga_jual'],
                'stok' => $row['stok'],
                'keterangan' => $row['keterangan'],
            ]);
        }
    }
}