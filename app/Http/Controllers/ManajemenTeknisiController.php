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



public function datatable(Request $request){
    {
        $data = User::query()->where('role', 'teknisi');
        return DataTables::of($data)->make(true);
    }
}

public function edit($id)
{
    $admin = User::find($id);

    return response()->json($admin);
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'no_hp' => 'required|string|max:15',
        'email' => 'required|string|email|max:255|unique:users',
        'pass' => 'required|string|min:8',
    ]);

    $admin = User::find($id);
    $admin->update($validatedData);

    return response()->json(['success' => 'Data berhasil diupdate']);
}

public function destroy(string $id)
{
    $antena = User::find($id);
    $antena->delete();
    return response()->json(['success','Data antena berhasil dihapus!']);
}

}
