<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\LaporanTagihan;
use App\Models\Operasional;
use App\Models\Antena;
use App\Models\HubHtb;
use App\Models\Pelanggan;

use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total saldo
        $totalBalance = $this->calculateTotalBalance();

        // Hitung total tagihan yang belum dibayar
        $totalBills = LaporanTagihan::count();


        // Hitung jumlah operasional
        $operationalAmount = Operasional::sum('jumlah');

        // Hitung total pembayaran yang dilakukan
        $totalPaymentAmount = Pembayaran::sum('jumlah_pembayaran');

        // Hitung jumlah antena
        $antenaCount = Antena::count();

        // Hitung jumlah Hub HTB
        $hubHtbCount = HubHtb::count();

        // Ambil 10 data pelanggan terbaru
        $pelanggan = Pelanggan::with('petugas')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        // Ambil 10 data tagihan terbaru
        $tagihan = LaporanTagihan::with('pelanggan')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

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
        return Pembayaran::sum('jumlah_pembayaran');
    }

    public function teknisiDashboard()
    {
        $idPetugas = Auth::id();

        // Hitung total saldo dari tabel pembayaran berdasarkan id_petugas
        $jumlahSaldo = Pembayaran::where('id_petugas', $idPetugas)->sum('jumlah_pembayaran');

        $totalTagihan = Pembayaran::where('id_petugas', $idPetugas)->count();

        return view('teknisi.dashboard', compact('jumlahSaldo', 'totalTagihan'));
    }
}
