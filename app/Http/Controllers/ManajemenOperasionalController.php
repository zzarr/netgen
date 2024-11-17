<?php

namespace App\Http\Controllers;

use App\Models\Operasional;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use PDF;

class ManajemenOperasionalController extends Controller
{
    public function exportPDF(Request $request)
{
    // Query dasar untuk data Operasional
    $query = Operasional::query();

    // Filter berdasarkan tanggal jika ada input dari request
    $startDate = null;
    $endDate = null;
    
    if ($request->has('startDate') && $request->has('endDate')) {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $query->whereBetween('tanggal', [$startDate, $endDate]);
    }

    // Ambil data yang sudah difilter
    $dataOperasional = $query->get();

    // Load tampilan PDF dengan data yang difilter dan variabel tanggal
    $pdf = PDF::loadView('admin.manajemen_operasional_pdf', compact('dataOperasional', 'startDate', 'endDate'));

    // Download file PDF
    return $pdf->download('data_operasional.pdf');
}


    public function index()
    {
        $totalSaldo = Operasional::sum('jumlah'); // Menghitung total dari kolom jumlah

        return view('admin.manajemenoperasional', compact('totalSaldo')); // Kirim total saldo ke view
    }

    public function datatable(Request $request)
    {
        $query = Operasional::query();
    
        // Filter berdasarkan tanggal jika ada
        if ($request->has('startDate') && $request->has('endDate')) {
            $startDate = $request->input('startDate');
            $endDate = $request->input('endDate');
            $query->whereBetween('tanggal', [$startDate, $endDate]);
        }
    
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<button class="btn btn-warning edit-button" data-id="' . $row->id . '">Edit</button>
                        <button class="btn btn-danger delete-button" data-id="' . $row->id . '">Hapus</button>';
            })
            ->editColumn('jumlah', function ($row) {
                // Menghapus desimal jika nilai adalah bilangan bulat
                return fmod($row->jumlah, 1) == 0 ? intval($row->jumlah) : number_format($row->jumlah, 2);
            })
            ->rawColumns(['action'])
            ->make(true); // Sudah mengembalikan response data
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'kategori' => 'required|string',
            'jumlah' => 'required|numeric',
        ]);

        // Menghapus desimal jika nilai adalah bilangan bulat sebelum disimpan
        $jumlah = $request->input('jumlah');
        $request->merge(['jumlah' => fmod($jumlah, 1) == 0 ? intval($jumlah) : $jumlah]);

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

        // Menghapus desimal jika nilai adalah bilangan bulat sebelum diperbarui
        $jumlah = $request->input('jumlah');
        $request->merge(['jumlah' => fmod($jumlah, 1) == 0 ? intval($jumlah) : $jumlah]);

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
