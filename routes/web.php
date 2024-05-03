<?php

use App\http\Controllers\HomeController;
use App\http\Controllers\AbsensiController;
use App\http\Controllers\CategoryController;
use App\http\Controllers\DataController;
use App\http\Controllers\MenuController;
use App\http\Controllers\MejaController;
use App\http\Controllers\StokController;
use App\http\Controllers\ProdukController;
use App\http\Controllers\UserController;
use App\http\Controllers\TransaksiController;
use App\http\Controllers\JenisController;
use App\http\Controllers\PelangganController;
use App\http\Controllers\PemesananController;
use App\http\Controllers\ProdukTitipanController;
use App\http\Controllers\TitipanController;
use App\http\Controllers\DetailTransaksiController;
use App\Http\Controllers\UserManagerController;
use Illuminate\Support\Facades\Route;

//login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/data', [DataController::class, 'index'])->name('data');
    Route::get('/sejarah', [HomeController::class, 'index1'])->name('sejarah');
    Route::get('/contact', [HomeController::class, 'index2'])->name('contact');
    Route::get('/chart', [DataController::class, 'index'])->name('chart.index');
    Route::get('/get-chart-data', [DataController::class, 'getDataChart']);
    Route::get('/pendapatan-per-tanggal', [DataController::class])->name('data.index');

    Route::group(['middleware' => ['cekUserLogin:1']], function () {
        Route::resource('/user', UserManagerController::class);

        Route::resource('/absensi', AbsensiController::class);
        Route::get('unduhabsensi', [AbsensiController::class, 'unduhExport'])->name('unduhabsensi');
        Route::post('update-status', [AbsensiController::class, 'updateStatus']);
        Route::get('export/absensi/pdf', [AbsensiController::class, 'generatepdf'])->name('export-absensi-pdf');
        Route::get('export/absensi', [AbsensiController::class, 'exportData'])->name('export-absensi');
        Route::post('absensi/import', [AbsensiController::class, 'importData'])->name('import-absensi');

        Route::resource('/category', CategoryController::class);
        Route::get('export/category/pdf', [CategoryController::class, 'generatepdf'])->name('export-category-pdf');
        Route::get('export/category', [CategoryController::class, 'exportData'])->name('export-category');
        Route::post('category/import', [CategoryController::class, 'importData'])->name('import-category');

        Route::resource('/meja', MejaController::class);
        Route::get('export/meja/pdf', [MejaController::class, 'generatepdf'])->name('export-meja-pdf');
        Route::get('export/meja', [MejaController::class, 'exportData'])->name('export-meja');
        Route::post('meja/import', [MejaController::class, 'importData'])->name('import-meja');

        Route::resource('/jenis', JenisController::class);
        Route::get('export/jenis/pdf', [JenisController::class, 'generatepdf'])->name('export-jenis-pdf');
        Route::get('export/jenis', [JenisController::class, 'exportData'])->name('export-jenis');
        Route::post('jenis/import', [JenisController::class, 'importData'])->name('import-jenis');

        Route::resource('/menu', MenuController::class);
        Route::get('export/menu', [MenuController::class, 'exportData'])->name('export-menu');
        Route::post('menu/import', [MenuController::class, 'importData'])->name('import-menu');
        Route::get('export/menu/pdf', [MenuController::class, 'generatepdf'])->name('export-menu-pdf');
        Route::get('/menu', [MenuController::class, 'index'])->name('jenis.filter');

        Route::resource('/stok', StokController::class);
        Route::get('export/stok/pdf', [StokController::class, 'generatepdf'])->name('export-stok-pdf');
        Route::get('export/stok', [StokController::class, 'exportData'])->name('export-stok');
        Route::post('stok/import', [StokController::class, 'importData'])->name('import-stok');
        //Route::resource('/category', CategoryController::class);
    });

    Route::group(['middleware' => ['cekUserLogin:2']], function () {
        Route::resource('/pelanggan', PelangganController::class);
        Route::get('export/pelanggan', [PelangganController::class, 'exportData'])->name('export-pelanggan');
        Route::post('pelanggan/import', [PelangganController::class, 'importData'])->name('import-pelanggan');
        Route::get('export/pelanggan/pdf', [PelangganController::class, 'generatepdf'])->name('export-pelanggan-pdf');

        Route::resource('/pemesanan', PemesananController::class);

        Route::resource('/titipan', TitipanController::class);
        Route::get('export/titipan', [TitipanController::class, 'exportData'])->name('export-titipan');
        Route::post('titipan/import', [TitipanController::class, 'importData'])->name('import-titipan');
        // Route::post('titipan/import', [ProductController::class, 'importData'])->name('import-titipan');
        Route::resource('/transaksi', TransaksiController::class);
        Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);
        //Route::resource('/produk', ProdukController::class);
    });

    Route::group(['middleware' => ['cekUserLogin:3']], function () {
        Route::resource('/laporan', DetailTransaksiController::class);
        Route::get('export/laporan', [DetailTransaksiController::class, 'exportData'])->name('export-laporan');
        Route::get('export/laporan/pdf', [DetailTransaksiController::class, 'generatepdf'])->name('export-laporan-pdf');
    });
});
