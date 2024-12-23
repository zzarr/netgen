<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AntenaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TeknisiPelangganController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\ManajemenAdminController;
use App\Http\Controllers\ManajemenTeknisiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManajemenHubHtbController;
use App\Http\Controllers\ManajemenOperasionalController;
use App\Http\Controllers\DetailTagihanController;
use App\Http\Controllers\TeknisiTagihanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth', 'verified');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth', 'verified');
// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// });


// ------------ Admin ---------------

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {

    //fadhil
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('/admin/template', function () {
        return view('admin.layouts.app');
    });

    // Tambahkan rute untuk manajemen operasional
    Route::get('/admin/operasional/datatable', [ManajemenOperasionalController::class, 'datatable'])->name('manajemen_operasional.datatable');
    Route::get('/admin/operasional', [ManajemenOperasionalController::class, 'index'])->name('manajemen_operasional.index');
    Route::post('/admin/operasional/store', [ManajemenOperasionalController::class, 'store'])->name('manajemen_operasional.store');
    Route::get('/admin/operasional/edit/{id}', [ManajemenOperasionalController::class, 'edit'])->name('manajemen_operasional.edit');
    Route::put('/admin/operasional/update/{id}', [ManajemenOperasionalController::class, 'update'])->name('manajemen_operasional.update');
    Route::delete('/admin/operasional/delete/{id}', [ManajemenOperasionalController::class, 'destroy'])->name('manajemen_operasional.delete');
    Route::get('/admin/operasional/export-pdf', [ManajemenOperasionalController::class, 'exportPDF'])->name('manajemen_operasional.export_pdf');



    //Lucky
    Route::get('admin/antena/datatables', [AntenaController::class, 'datatable'])->name('admin.antena.datatable');
    Route::get('/admin/antena', [AntenaController::class, 'index'])->name('antena_admin');
    Route::post('/admin/antena/store', [AntenaController::class, 'store'])->name('admin.antena.store');
    Route::get('/admin/antena/edit/{id}', [AntenaController::class, 'edit']);
    Route::put('/admin/antena/update/{id}', [AntenaController::class, 'update']);
    Route::delete('/admin/antena/delete/{id}', [AntenaController::class, 'destroy'])->name('admin.antena.delete');



    Route::get('/admin/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
    Route::post('/admin/pelanggan/import', [PelangganController::class, 'importJson'])->name('import');
    Route::post('/admin/pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('/pelanggan/data', [PelangganController::class, 'getPelangganData'])->name('pelanggan.data');
    Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::put('/pelanggan/update/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
    
   


    Route::get('/pelanggan/laporan-tagihan', [TagihanController::class, 'index'])->name('tagihan.aja');
    Route::get('/pelanggan/laporan-tagihan/data', [TagihanController::class, 'datatable'])->name('pelanggan.tagihan.data');
   
    Route::post('/pelanggan/tagihan/update', [TagihanController::class, 'updateBayar'])->name('update.bayar');

    //MASL


    //andin
    Route::get('admin/hubhtb/datatables', [ManajemenHubHtbController::class, 'datatable'])->name('hubhtb.data');
    Route::get('/admin/hubhtb', [ManajemenHubHtbController::class, 'index'])->name('manajemen_hubhtb');
    Route::get('/admin/addhubhtb', [ManajemenHubHtbController::class, 'create'])->name('add_hubhtb');
    Route::post('/admin/hubhtb', [ManajemenHubHtbController::class, 'store'])->name('manajemen_hubhtb.store');
    Route::get('/admin/hubhtb/{id}', [ManajemenHubHtbController::class, 'show'])->name('manajemen_hubhtb.show');
    Route::put('/admin/hubhtb/update/{id}', [ManajemenHubHtbController::class, 'update'])->name('manajemen_hubhtb.update');
    Route::delete('/admin/hubhtb/{id}', [ManajemenHubHtbController::class, 'destroy'])->name('manajemen_hubhtb.destroy');
    Route::get('/admin/hubhtb/edit/{id}', [ManajemenHubHtbController::class, 'edit'])->name('manajemen_hubhtb.edit');


    //MasL
    Route::get('/teknisi/datatables', [ManajemenTeknisiController::class, 'datatable'])->name('teknisi.data');
    Route::get('/admin/datatables', [ManajemenAdminController::class, 'datatable'])->name('admin.data');
    Route::get('/admin/manajemenadmin', [ManajemenAdminController::class, 'index'])->name('manajemen_admin');
    Route::get('/admin/manajementeknisi', [ManajemenTeknisiController::class, 'index'])->name('manajemen_teknisi');
    Route::get('/admin/addteknisi', [ManajemenTeknisiController::class, 'create'])->name('add_teknisi');
    Route::get('/admin/addadmin', [ManajemenAdminController::class, 'create'])->name('add_admin');
    Route::post('/admin/store', [ManajemenAdminController::class, 'store'])->name('admin.store');
    Route::post('/teknisi/store', [ManajemenTeknisiController::class, 'store'])->name('teknisi.store');
    Route::delete('/admin/delete/{id}', [ManajemenAdminController::class, 'destroy'])->name('admin.delete');
    Route::delete('/teknisi/delete/{id}', [ManajemenTeknisiController::class, 'destroy'])->name('teknisi.delete');
    Route::get('/admin/edit/{id}', [ManajemenAdminController::class, 'edit']);
    Route::put('/admin/update/{id}', [ManajemenAdminController::class, 'update']);
    Route::get('/teknisi/edit/{id}', [ManajemenAdminController::class, 'edit']);
    Route::put('/teknisi/update/{id}', [ManajemenAdminController::class, 'update']);
    Route::put('/admin/update-password/{id}', [ManajemenAdminController::class, 'updatePassword']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pelanggan/{id}/detail', [PelangganController::class, 'showDetail']);
    Route::get('/pelanggan/tagihan/{id}', [TagihanController::class, 'getTagihan'])->name('pelanggan.tagihan');
    Route::post('/pelanggan/bayar', [TagihanController::class, 'bayar'])->name('bayar');
    Route::delete('/pelanggan/delete/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
    Route::get('/pelanggan/data/export', [PelangganController::class, 'getDataPelanggan'])->name('pelanggan.eksport');
});


//MASL


//andin
Route::get('admin/hubhtb/datatables', [ManajemenHubHtbController::class, 'datatable'])->name('hubhtb.data');
Route::get('/admin/hubhtb', [ManajemenHubHtbController::class, 'index'])->name('manajemen_hubhtb');
Route::get('/admin/addhubhtb', [ManajemenHubHtbController::class, 'create'])->name('add_hubhtb');
Route::post('/admin/hubhtb', [ManajemenHubHtbController::class, 'store'])->name('manajemen_hubhtb.store');
Route::get('/admin/hubhtb/{id}', [ManajemenHubHtbController::class, 'show'])->name('manajemen_hubhtb.show');
Route::put('/admin/hubhtb/update/{id}', [ManajemenHubHtbController::class, 'update'])->name('manajemen_hubhtb.update');
Route::delete('/admin/hubhtb/{id}', [ManajemenHubHtbController::class, 'destroy'])->name('manajemen_hubhtb.destroy');
Route::get('/admin/hubhtb/edit/{id}', [ManajemenHubHtbController::class, 'edit'])->name('manajemen_hubhtb.edit');


//MasL
Route::get('/admin/datatables', [ManajemenAdminController::class, 'datatable'])->name('admin.data');
Route::get('/admin/manajemenadmin', [ManajemenAdminController::class, 'index'])->name('manajemen_admin');
Route::get('/admin/addadmin', [ManajemenAdminController::class, 'create'])->name('add_admin');
Route::post('/admin/store', [ManajemenAdminController::class, 'store'])->name('admin.store');
Route::get('/admin/edit/{id}', [ManajemenAdminController::class, 'edit']);
Route::put('/admin/update/{id}', [ManajemenAdminController::class, 'update']);
Route::delete('/admin/delete/{id}', [ManajemenAdminController::class, 'destroy'])->name('admin.delete');
Route::put('/admin/update-password/{id}', [ManajemenAdminController::class, 'updatePassword']);
Route::post('/teknisi/store', [ManajemenTeknisiController::class, 'store'])->name('teknisi.store');
Route::delete('/teknisi/delete/{id}', [ManajemenTeknisiController::class, 'destroy'])->name('teknisi.delete');
Route::get('/teknisi/datatables', [ManajemenTeknisiController::class, 'datatable'])->name('teknisi.data');
Route::get('/teknisi/edit/{id}', [ManajemenTeknisiController::class, 'edit']);
Route::put('/teknisi/update/{id}', [ManajemenTeknisiController::class, 'update']);
Route::put('/teknisi/update-password/{id}', [ManajemenTeknisiController::class, 'updatePassword']);
Route::get('/admin/manajementeknisi', [ManajemenTeknisiController::class, 'index'])->name('manajemen_teknisi');
Route::get('/admin/addteknisi', [ManajemenTeknisiController::class, 'create'])->name('add_teknisi');
// ------------ Teknisi ---------------
Route::middleware(['auth', 'verified', 'role:teknisi'])->group(function () {
    Route::get('/teknisi/dashboard', [DashboardController::class, 'teknisiDashboard'])->name('teknisi.dashboard');

    Route::get('/teknisi/pelanggan', [TeknisiPelangganController::class, 'index'])->name('teknisi.pelanggan');
    Route::get('/teknisi/pelanggan/data', [TeknisiPelangganController::class, 'getPelangganData'])->name('teknisi.pelanggan.data');

    Route::get('/teknisi/tagihan', [TeknisiTagihanController::class, 'index'])->name('teknisi.tagihan');
    Route::get('/teknisi/tagihan/data', [TeknisiTagihanController::class, 'datatable'])->name('teknisi.tagihan.data');


});
