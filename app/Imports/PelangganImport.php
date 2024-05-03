<?php

namespace App\Imports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PelangganImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pelanggan([
            'id' => $row["id"],
            'nama_pelanggan' => $row["nama_pelanggan"],
            'email' => $row["email"],
            'no_telp' => $row["no_telp"],
            'alamat' => $row["alamat"],
        ]);
    }
    public function headingRow(){
        return 3;
    }
}