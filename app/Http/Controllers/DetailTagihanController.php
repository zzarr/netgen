<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanTagihan;
use App\Models\Pembayaran;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Log;

class DetailTagihanController extends Controller
{
    public function index(){
        return view('admin.tagihan.tagihan');
    }

    public function getLaporanTagihanData(Request $request)
    {
        
            $data = LaporanTagihan::get();
    
            
    
             return response()->json($data, 200, $headers); // Membuat respons DataTables
        
        
    }
}
