<?php

namespace App\Http\Controllers;

use App\Models\Operasional;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ManajemenOperasionalController extends Controller
{
    public function index()
    {
        return view('admin.manajemenoperasional');
    }

    public function datatable()
    {
        $operasional = Operasional::all();
        return DataTables::of($operasional)
            ->addColumn('action', function ($row) {
                return '<button class="btn btn-warning edit-button" data-id="' . $row->id . '">Edit</button>
                        <button class="btn btn-danger delete-button" data-id="' . $row->id . '">Hapus</button>';
            })
            ->editColumn('jumlah', function ($row) {
                // Menghapus desimal jika nilai adalah bilangan bulat
                return fmod($row->jumlah, 1) == 0 ? intval($row->jumlah) : number_format($row->jumlah, 2);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'kategori' => 'required|string',
            'jumlah' => 'required|numeric',
        ]);

        Operasional::create($request->all());

        return response()->json(['success' => 'Data berhasil disimpan.']);
    }

    public function edit($id)
    {
        $operasional = Operasional::findOrFail($id);
        return response()->json($operasional);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'kategori' => 'required|string',
            'jumlah' => 'required|numeric',
        ]);

        $operasional = Operasional::findOrFail($id);
        $operasional->update($request->all());

        return response()->json(['success' => 'Data berhasil diperbarui.']);
    }

    public function destroy($id)
    {
        $operasional = Operasional::find($id);
        if ($operasional) {
            $operasional->delete();
            return response()->json(['success' => 'Data berhasil dihapus.']);
        }

        return response()->json(['error' => 'Data tidak ditemukan.'], 404);
    }
}