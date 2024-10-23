<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use DataTables;

class PelangganController extends Controller
{
    public function index(){
        
        return view('admin.pelanggan', );
    }

    // Fungsi untuk menyediakan data pelanggan via AJAX
    public function getPelangganData(Request $request)
    {
        if ($request->ajax()) {
            $data = Pelanggan::all(); // Mendapatkan semua data pelanggan
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    return '<button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                })
                ->make(true); // Mengubah menjadi format JSON untuk DataTable
        }
    }

}
