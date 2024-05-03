<?php

namespace App\Imports;

use App\Models\meja;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class mejaImport implements ToModel, WithHeadingRow
{
    public function headingRow(){
        return 3;
    }
    public function model(array $rows)
    {
        return new meja([
            'no_meja' => $rows['no_meja'],
            'kapasitas' => $rows['kapasitas'],
            'status' => $rows['status'],
        ]);
    }
}