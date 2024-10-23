<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index(){
        $pelanggans = Pelanggan::all();
        return view('admin.pelanggan', compact('pelanggans'));
    }
}
