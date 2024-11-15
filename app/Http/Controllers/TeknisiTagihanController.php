<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanTagihan;
use App\Models\Pembayaran;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Auth;



class TeknisiTagihanController extends Controller
{
    public function index(){
        $total = Pembayaran::where('id_petugas', Auth::id())->sum('jumlah_pembayaran');
        return view('teknisi.tagihan.tagihan', compact('total'));
    }

    public function datatable(Request $request)
{
    if ($request->ajax()) {
        $query = Pembayaran::with('laporantagihan.pelanggan')->where('id_petugas', Auth::id());
        
        // Filter berdasarkan tanggal jika startDate dan endDate ada di request
        if ($request->filled('startDate') && $request->filled('endDate')) {
            $query->whereBetween('created_at', [$request->startDate, $request->endDate]);
        }

        $data = $query->get();

        return DataTables::of($data)
            ->make(true);
    }
}
}
