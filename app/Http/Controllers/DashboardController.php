<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operasional;
use App\Models\LaporanTagihan; 
use APp\Models\pembayaran;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data dari tabel operasional dan total tagihan
        $operationalAmount = Operasional::sum('jumlah'); // menghitung total jumlah operasional
        $totalBills = LaporanTagihan::sum('kurang'); // menghitung total jumlah tagihan dari kolom 'kurang' di LaporanTagihan
        $totalBalance = $operationalAmount - $totalBills; // Menghitung balance sebagai selisih dari operasional dan tagihan

        // Kirimkan data yang dibutuhkan ke view
        return view('admin.dashboard', [
            'operationalAmount' => $operationalAmount,
            'totalBills' => $totalBills,
            'totalBalance' => $totalBalance,
        ]);
    }
}
