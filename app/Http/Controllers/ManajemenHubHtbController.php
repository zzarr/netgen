<?php

namespace App\Http\Controllers;
use App\Models\HubHtb;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ManajemenHubHtbController extends Controller
{
    public function index()
    {
        return view('admin.manajemenhubhtb');
    }

    public function datatable(Request $request)
    {
        $data = HubHtb::query();
        return DataTables::of($data)->make(true);
    }

    // Menampilkan form untuk membuat data baru
    public function create()
    {
        return view('admin.createhubhtb');
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
{
    $request->validate([
        'nama_alat' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
    ]);

    HubHtb::create([
        'nama_alat' => $request->nama_alat,
        'alamat' => $request->alamat,
    ]);

    return redirect()->back()->with('success', 'Admin berhasil disimpan');
}

    // Menampilkan form edit data berdasarkan ID
    public function edit($id)
    {
        $hubhtb = HubHtb::find($id);
        return response()->json($hubhtb);
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nama_alat' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
    ]);

    $hubHtb = HubHtb::find($id);
    $hubHtb->update([
        'nama_alat' => $request->nama_alat,
        'alamat' => $request->alamat,
    ]);
    $hubhtb>update($validatedData);
    return response()->json(['success' => 'Data berhasil di-update']);
}


    // Menghapus data dari database berdasarkan ID
    public function destroy($id)
    {
        $hubhtb = HubHtb::find($id);
        $hubhtb->delete();
        return response()->json(['success','Data admin berhasil dihapus!']);
    }
}
