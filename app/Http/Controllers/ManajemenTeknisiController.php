<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ManajemenTeknisiController extends Controller
{
    public function index()
    {
        return view('admin.manajementeknisi');
    }
    public function create()
    {
        return view('admin.addteknisi');
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'no_hp' => 'required|string|max:15',
        'email' => 'required|string|email|max:255|unique:users',
        'pass' => 'required|string|min:8',
    ]);

    // Simpan data sebagai teknisi
    User::create([
        'nama' => $request->nama,
        'no_hp' => $request->no_hp,
        'email' => $request->email,
        'password' => bcrypt($request->pass),
        'role' => 'teknisi',  // Set role sebagai teknisi
    ]);

    return redirect()->back()->with('success', 'Teknisi berhasil disimpan');
}

public function getData()
{
    $data = User::select('id', 'nama', 'no_hp', 'email')
    ->whereIn('role', ['teknisi']);

    return DataTables::of($data)
        ->addColumn('action', function($row){
            return '<a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a> |
                    <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">Delete</a>';
        })
        ->make(true);
}

}
