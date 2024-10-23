<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


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
        'pass' => 'required|string|min:8|confirmed',
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

}
