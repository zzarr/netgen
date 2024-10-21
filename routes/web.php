<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AntenaController;
use App\Http\Controllers\PelangganController;

use App\Http\Controllers\ManajemenAdminController;
use App\Http\Controllers\ManajementeknisiController;
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

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/template', function () {
    return view('admin.layouts.app');
});

Route::get('/admin/antena', [AntenaController::class, 'index'])->name('antena_admin');



Route::get('/admin/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
//MASL
Route::get('/admin/manajemenadmin', [ManajemenAdminController::class, 'index'])->name('manajemen_admin');
Route::get('/admin/manajementeknisi', [ManajementeknisiController::class, 'index'])->name('manajemen_teknisi');
