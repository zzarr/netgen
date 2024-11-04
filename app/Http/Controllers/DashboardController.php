<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\LaporanTagihan;
use App\Models\Operasional;
use App\Models\Antena;
use App\Models\HubHtb;
use App\Models\Pelanggan;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total saldo
        $totalBalance = $this->calculateTotalBalance();

        // Hitung total tagihan
        $totalBills = LaporanTagihan::sum('kurang'); // Total tagihan yang belum dibayar

        // Hitung jumlah operasional
        $operationalAmount = Operasional::sum('jumlah'); // Jumlah total operasional

        // Hitung total pembayaran
        $totalPaymentAmount = Pembayaran::sum('jumlah_pembayaran'); // Total pembayaran yang dilakukan

        // Hitung jumlah antena
        $antenaCount = Antena::count(); // Jumlah total antena

        // Hitung jumlah Hub HTB
        $hubHtbCount = HubHtb::count(); // Jumlah total Hub HTB

        // Ambil data pelanggan
        $pelanggan = Pelanggan::with('petugas')->get(); // Ambil semua data pelanggan beserta relasi petugas

        // Ambil data tagihan
        $tagihan = LaporanTagihan::with('pelanggan')->get(); // Ambil semua data tagihan beserta relasi pelanggan

        // Kembalikan tampilan dashboard dengan data yang diperlukan
        return view('admin.dashboard', compact(
            'totalBalance', 
            'totalBills', 
            'operationalAmount', 
            'totalPaymentAmount', 
            'antenaCount', 
            'hubHtbCount', 
            'pelanggan', 
            'tagihan'
        ));
    }

    private function calculateTotalBalance()
    {
        // Hitung total saldo dari tabel pembayaran
        return Pembayaran::sum('jumlah_pembayaran'); // Menghitung total jumlah pembayaran
    }

    public function teknisiDashboard()
    {
        return view('teknisi.dashboard'); // Pastikan Anda memiliki tampilan untuk dashboard teknisi
    }
}
