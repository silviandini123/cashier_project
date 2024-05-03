<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Http\Requests\StoreMejaRequest;
use App\Http\Requests\UpdateMejaRequest;
use PDOException;
use App\Imports\MejaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Meja\Exports;
use App\Exports\MejaExport;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PDF;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data['meja'] = Meja::get();
            return view('meja.index')->with($data);
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
    public function store(StoreMejaRequest $request)
    {
        Meja::create($request->all());

        return redirect('meja')->with('success', 'Data meja berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meja $meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMejaRequest $request, string $id)
    {
        $meja = Meja::find($id)->update($request->all());
        return redirect('meja')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Meja::find($id)->delete();
        return redirect('meja')->with('success','Data meja berhasil dihapus!');
    }

    public function exportData(){
        $date = date('Y-m-d');
        return Excel::download(new MejaExport, $date.'_meja.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new MejaImport, $request->import);
        return redirect()->back()->with('success', 'Import data Produk Meja berhasil');
    }

    public function generatePDF()
    {
        // Data untuk ditampilkan dalam PDF
        $data = Meja::all(); 
          
        // Render view ke HTML
        $pdf = PDF::loadView('meja/meja-pdf', ['meja'=>$data]); 
        $date = date('Y-m-d');
        return $pdf->download($date.'-data-meja.pdf');
    }

}
