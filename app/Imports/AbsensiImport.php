<?php

namespace App\Imports;

use App\Models\absensi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class absensiImport implements ToModel, WithHeadingRow
{
    public function headingRow(){
        return 3;
    }
    public function model(array $rows)
    {
        return new absensi([
            'namaKaryawan' => $rows['nama_karyawan'],
            'tanggalMasuk' => $rows['tanggal_masuk'],
            'waktuMasuk' => $rows['waktu_masuk'],
            'status' => $rows['status'],
            'waktuKeluar' => $rows['waktu_keluar'],
        ]);
    }
}