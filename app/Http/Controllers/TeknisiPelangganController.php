<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use DataTables;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TeknisiPelangganController extends Controller
{
    public function index(){
        $alamat = Pelanggan::select('alamat')->distinct()->get();
        return view('teknisi.pelanggan.pelanggan', compact('alamat'));
    }

    public function getPelangganData(Request $request)
    {
        if ($request->ajax()) {
            $query = Pelanggan::orderBy('created_at', 'desc'); // Mendapatkan semua query pelanggan
            if($request->filled('alamat')){
                $query->where('alamat', $request->alamat);
            }
            $data = $query->get();
            
            return DataTables::of($data)
            ->addColumn('action', function($row){
                $btn = '<button class="btn btn-outline-info show-detail rounded-circle mx-1" data-id="'.$row->id.'" data-target="#detailPelangganModal" data-toggle="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1" height="1" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zm-8 4a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                        <path d="M8 5a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/>
                    </svg>
                </button>';

                

               

                return $btn;
            })
                ->addColumn('tagihan', function($row){
                    return '<button class="btn btn-outline-info btn-sm rounded-circle tagihan" data-id="'.$row->id.'" data-toggle="modal" data-target="#tagihanModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                                    <path d="M8 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2v1a2 2 0 0 0 2-2v-1a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H8zm0 1h4a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H8V1zm-1 0H3a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h4V1z"/>
                                </svg>
                            </button>';
                })
                ->rawColumns(['action', 'tagihan']) // Menandai kolom yang mengandung HTML
                ->make(true);
        }
    }
}
