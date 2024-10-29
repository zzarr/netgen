<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antena;
use Yajra\DataTables\Facades\DataTables;

class AntenaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.antena');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function datatable(Request $request){
        {
            $data = Antena::query();
            return DataTables::of($data)->make(true);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'IP' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6'
        ]);

        Antena::create([
            'nama' => $request->nama,
            'IP' => $request->IP,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'password' => $request->password
        ]);
        return response()->json(['success' => 'Data berhasil ditambahkan!']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $antena = Antena::find($id);

        return response()->json($antena);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'IP' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6'
        ]);

        $antena = Antena::find($id);
        $antena->update($validatedData);

        return response()->json(['success' => 'Data berhasil diupdate']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $antena = Antena::find($id);
        $antena->delete();
        return response()->json(['success','Data antena berhasil dihapus!']);
    }
}
