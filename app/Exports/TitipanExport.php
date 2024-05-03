<?php

namespace App\Exports;

use App\Models\Titipan;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use \Maatwebsite\Excel\Sheet;
use App\Exports\PaketExport;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class TitipanExport implements FromCollection, withHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Titipan::get();
    }

    public function exportData() {
        $date = date('Y-m-d');
        return Excel::download(new TitipanExport, $date.'_titipan.xlsx');
    }
    public function headings(): array
    {
        return[
            'No.',
            'Nama Produk',
            'Nama Supplier',
            'Harga Beli',
            'Harga Jual',
            'Stok',
            'Keterangan'
        ];
    }

    public function registerEvents(): array
    {
        return[
            AfterSheet::class  => function(AfterSheet $event) {
                $event->sheet->grtColumnDimension('A')->setAutoSize(true);
                $event->sheet->grtColumnDimension('B')->setAutoSize(true);
                $event->sheet->grtColumnDimension('C')->setAutoSize(true);

                $event->sheet->insertNewRoeBefore(1, 2);
                $event->sheet->mergeCells('A1, C1');
                $event->sheet->setCellValue('A1','Titipan');
                $event->sheet->getStyle('A1')->getFont()->setBold(true);
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $event->sheet->getStyle('A3:C' .$event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \phpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000']
                        ]
                    ]
                ]);
            }
        ];
    }
}
