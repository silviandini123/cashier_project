<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Jenis;
use App\Models\Stok;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Imports\MenuImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Menu\Exports;
use App\Exports\MenuExport;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\View;
use PDF;
use PDOException;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $jenis_id = $request->jenis_id;
            $query = Menu::query();
            -$data['selected_jenis_id'] = null;

            if ($jenis_id) {
                $data['selected_jenis_id'] = $jenis_id; // Menambahkan jenis yang dipilih
                $query = $query->where('jenis_id', '=', $jenis_id);
            }
            $data['menu'] = $query->get();
            $data['jenis'] = $query->get();
            return view('menu.index')->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            return $error->getMessage();
            // $this->failResponse($error->getMessage(), $error->getCode());
        }
    }


    public function filter(Request $request)
    {
        try {
            $jenis_id = $request->jenis_id;

            $query = Jenis::query();
            $data['selected_jenis_id'] = null;

            if ($jenis_id) {
                $data['selected_jenis_id'] = $jenis_id; // Menambahkan jenis yang dipilih
                $query->where('jenis_id', $jenis_id);
            }

            $data['jenis'] = $query->get();


            return view('jenis.index')->with($data);
        } catch (QueryException | Exception | PDOException $error) {
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
    public function store(StoremenuRequest $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $data = $request->all();
        $data['image'] = $imageName;

        menu::create($data);

        return redirect('menu')->with('success', 'Data menu berhasil di tambahkan!');

        return back()->with('success' . 'You have successfully uploaded ann image.')->with('images', $imageName);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, string $id)
    {
        $menu = Menu::find($id);
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $data = $request->all();
        $data['image'] = $imageName;

        $menu->update($data);
        return redirect('menu')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Menu::find($id)->delete();
        return redirect('menu')->with('success', 'Data Menu berhasil dihapus!');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new MenuExport, $date . '_menu.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new MenuImport, $request->import);
        return redirect()->back()->with('success', 'Import data Menu berhasil');
    }

    public function generatepdf()
    {
        // Get data
        $menu = Menu::all();

        // Loop through menu items and encode images to base64
        foreach ($menu as $p) {
            $imagePath = public_path('images/' . $p->image);
            $imageData = base64_encode(file_get_contents($imagePath));
            $p->imageData = $imageData;
        }

        // Generate PDF
        $dompdf = new Dompdf();
        $html = View::make('menu.menu-pdf', compact('menu'))->render();
        $dompdf->loadHtml($html);
        $dompdf->render();

        // Return the PDF as a download
        return $dompdf->stream('menu.pdf');
    }
}
