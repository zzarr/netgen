<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;


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
        $user = User::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => bcrypt($request->pass),
        ]);

        $user->assignRole('teknisi');

        return redirect()->back()->with('success', 'Teknisi berhasil disimpan');
    }



    public function datatable(Request $request)
    { {
            $data = User::role('teknisi');
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
        return response()->json(['success', 'Data antena berhasil dihapus!']);
    }
}
<<<<<<< HEAD

public function edit($id)
{
    $teknisi = User::find($id);

    return response()->json($teknisi);
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'no_hp' => 'required|string|max:15',
        'email' => 'required|string|email|max:255|unique:users',
        'pass' => 'required|string|min:8',
    ]);

    $teknisi = User::find($id);
    $teknisi->update($validatedData);

    return response()->json(['success' => 'Data berhasil diupdate']);
}

public function destroy(string $id)
{
    $teknisi = User::find($id);
    $teknisi->delete();
    return response()->json(['success','Data teknisi berhasil dihapus!']);
}

public function updatePassword(Request $request, $id)
    {
        // Validasi password baru
        $request->validate([
            'pass' => 'required|string|min:8', // Password minimal 6 karakter
        ]);


        // Temukan user admin berdasarkan ID dan update password
        $teknisi = User::find($id);
        if ($teknisi) {
            $teknisi->password = Hash::make($request->pass); // Hash password baru sebelum menyimpan
            $teknisi->save();
        }
    }

}
=======
>>>>>>> e5767b337013423a41dc4018b300ebf69d4d377e
