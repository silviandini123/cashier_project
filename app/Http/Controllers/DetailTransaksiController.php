<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreDetailTransaksiRequest;
use App\Http\Requests\UpdateDetailTransaksiRequest;
use PDOException;
use App\Imports\DetailTransaksiImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DetailTransaksi\Exports;
use App\Exports\LaporanExport;
use App\Models\DetailTransaksi;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PDF;


class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            try{
                $data['transaksi'] = Transaksi::get();
                return view('laporan.index')->with($data);
            }
            catch (QueryException | Exception | PDOException $error) {
                $this->failResponse($error->getMessage(), $error->getCode());
            }
    }

    public function filter(Request $request)
    {
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');

        $laporan = Transaksi::whereBetween('tanggal', [$tgl_awal, $tgl_akhir])->get();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDetailTransaksiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetailTransaksiRequest $request, DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailTransaksi $detailTransaksi)
    {
        //
    }

    public function exportData(){
        $date = date('Y-m-d');
        return Excel::download(new LaporanExport, $date.'laporan.xlsx');
    }

    public function generatePDF()
    {
        // Data untuk ditampilkan dalam PDF
        $data = Transaksi::all(); 
          
        // Render view ke HTML
        $pdf = PDF::loadView('laporan/laporan-pdf', ['transaksi'=>$data]); 
        $date = date('Y-m-d');
        return $pdf->download($date.'-data-laporan.pdf');
    }

}
