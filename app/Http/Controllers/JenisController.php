<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use PDOException;
use App\Imports\JenisImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Jenis\Exports;
use App\Exports\JenisExport;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PDF;
class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data['jenis'] = Jenis::get();
            return view('jenis.index')->with($data);
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
    public function store(StoreJenisRequest $request)
    {
        Jenis::create($request->all());

        return redirect('jenis')->with('success', 'Data produk berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisRequest $request, string $id)
    {
        $jenis = Jenis::find($id)->update($request->all());
        return redirect('jenis')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Jenis::find($id)->delete();
        return redirect('jenis')->with('success','Data jenis berhasil dihapus!');
    }

    public function exportData(){
        $date = date('Y-m-d');
        return Excel::download(new JenisExport, $date.'_jenis.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new JenisImport, $request->import);
        return redirect()->back()->with('success', 'Import data Produk Jenis berhasil');
    }

    public function generatePDF()
    {
        // Data untuk ditampilkan dalam PDF
        $data = Jenis::all(); 
          
        // Render view ke HTML
        $pdf = PDF::loadView('jenis/jenis-pdf', ['jenis'=>$data]); 
        $date = date('Y-m-d');
        return $pdf->download($date.'-data-jenis.pdf');
    }
}
