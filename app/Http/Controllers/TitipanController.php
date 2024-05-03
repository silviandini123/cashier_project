<?php

namespace App\Http\Controllers;

use App\Models\Titipan;
use App\Http\Requests\StoreTitipanRequest;
use App\Http\Requests\UpdateTitipanRequest;
use PDOException;
use App\Imports\TitipanImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Titipan\Exports;
use App\Exports\TitipanExport;
use Illuminate\Http\Request;

class TitipanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            try{
                $data['titipan'] = Titipan::get();
                return view('titipan.index')->with($data);
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
    public function store(StoreTitipanRequest $request)
    {
        Titipan::create($request->all());

        return redirect('titipan')->with('success', 'Data produk berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Titipan $titipan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Titipan $titipan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTitipanRequest $request, Titipan $titipan)
    {
        $titipan->update($request->all());
        return redirect('titipan')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Titipan $titipan)
    {
        $titipan->delete();
        return redirect('titipan')->with('succ ess','Data titipan berhasil dihapus!');
    }

    public function exportData(){
        $date = date('Y-m-d');
        return Excel::download(new TitipanExport, $date.'_titipan.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new TitipanImport, $request->import);
        return redirect()->back()->with('success', 'Import data Produk Titipan berhasil');
    }

}
