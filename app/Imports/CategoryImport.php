<?php

namespace App\Imports;

use App\Models\category;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class categoryImport implements ToModel, WithHeadingRow
{
    public function headingRow(){
        return 3;
    }
    public function model(array $rows)
    {
        return new category([
            'nama_category' => $rows['nama_category'],
        ]);
    }
}