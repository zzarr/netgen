<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AntenaController;
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
    return view('admin.layouts.app');
});

Route::get('/admin/antena', [AntenaController::class, 'index'])->name('antena_admin');
//MASL
Route::get('/admin/manajemenadmin', [ManajemenAdminController::class, 'index'])->name('manajemen_admin');
Route::get('/admin/manajementeknisi', [ManajementeknisiController::class, 'index'])->name('manajemen_teknisi');

//andin
Route::get('/admin/manajemenhubhtb', [ManajemenHubHtbController::class, 'index'])->name('manajemen_hubhtb');
