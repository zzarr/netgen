<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\User;

class ManajemenAdminController extends Controller
{
    public function index()
    {
        return view('admin.manajemenadmin');
    }
    public function create()
    {
        return view('admin.addadmin');
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

    // Simpan data sebagai admin
    User::create([
        'nama' => $request->nama,
        'no_hp' => $request->no_hp,
        'email' => $request->email,
        'password' => bcrypt($request->pass),
        'role' => 'admin',  // Set role sebagai admin
    ]);

    return redirect()->back()->with('success', 'Admin berhasil disimpan');
}



public function datatable(Request $request){
    {
        $data = User::query()->where('role', 'admin');
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
    $admin = User::find($id);
    $admin->delete();
    return response()->json(['success','Data admin berhasil dihapus!']);
}

}
