<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Jenis;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use App\Imports\PelangganImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Pelanggan\Exports;
use App\Exports\PelangganExport;
use Illuminate\Http\Request;
use PDF;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data['pelanggan'] = Pelanggan::get();
            $data['jenis'] = Jenis::get();
            return view('pelanggan.index')->with($data);
        }
        catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
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
    public function store(StorePelangganRequest $request)
    {
        {
            Pelanggan::create($request->all());
    
            return redirect('pelanggan')->with('success', 'Data Pelanggan berhasil di tambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelangganRequest $request, string $id)
    {
        $pelanggan = Pelanggan::find($id)->update($request->all());
        return redirect('pelanggan')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pelanggan::find($id)->delete();
        return redirect('pelanggan')->with('success','Data Pelanggan berhasil dihapus!');
    }

    public function exportData(){
        $date = date('Y-m-d');
        return Excel::download(new PelangganExport, $date.'_pelanggan.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new PelangganImport, $request->import);
        return redirect()->back()->with('success', 'Import data Menu berhasil');
    }

    public function generatePDF()
    {
        // Data untuk ditampilkan dalam PDF
        $data = Pelanggan::all(); 
          
        // Render view ke HTML
        $pdf = PDF::loadView('pelanggan/pelanggan-pdf', ['pelanggan'=>$data]); 
        $date = date('Y-m-d');
        return $pdf->download($date.'-data-pelanggan.pdf');
    }
}
