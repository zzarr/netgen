<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AntenaController;
use App\Http\Controllers\PelangganController;

use App\Http\Controllers\ManajemenAdminController;
use App\Http\Controllers\ManajemenTeknisiController;
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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/dashboard', function () {
    return view('admin.layouts.app');
});

Route::get('/admin/antena', [AntenaController::class, 'index'])->name('antena_admin');



Route::get('/admin/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
//MASL
Route::get('/admin/manajemenadmin', [ManajemenAdminController::class, 'index'])->name('manajemen_admin');
<<<<<<< HEAD
Route::get('/admin/manajementeknisi', [ManajementeknisiController::class, 'index'])->name('manajemen_teknisi');

//andin
Route::get('/admin/manajemenhubhtb', [ManajemenHubHtbController::class, 'index'])->name('manajemen_hubhtb');
=======
Route::get('/admin/manajementeknisi', [ManajemenTeknisiController::class, 'index'])->name('manajemen_teknisi');
Route::get('/admin/addteknisi', [ManajemenTeknisiController::class, 'create'])->name('add_teknisi');
Route::get('/admin/addadmin', [ManajemenAdminController::class, 'create'])->name('add_admin');
>>>>>>> 30a36afc98c4e2e41c62dc699b6d552afe0705dd
