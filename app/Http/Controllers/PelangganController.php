<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use DataTables;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class PelangganController extends Controller
{
    public function index(){
        
            $alamat = Pelanggan::select('alamat')->distinct()->get();
            @dd(auth()->user()->getRoleNames());
       
        return view('admin.pelanggan.pelanggan', compact('alamat'));
    }

    // Fungsi untuk menyediakan data pelanggan via AJAX
    public function getPelangganData(Request $request)
    {
        if ($request->ajax()) {
           
                $query = Pelanggan::orderBy('created_at', 'desc');
            

            if($request->filled('alamat')){
                $query->where('alamat', $request->alamat);
            }
            $data = $query->get();
            
            return DataTables::of($data)
            ->addColumn('action', function($row){
                $btn = '<button class="btn btn-outline-info show-detail rounded-circle mx-1" data-id="'.$row->id.'" data-target="#detailPelangganModal" data-toggle="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1" height="1" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zm-8 4a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                        <path d="M8 5a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/>
                    </svg>
                </button>';

                $btn .= '<button class="btn btn-outline-warning edit rounded-circle mx-1" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1" height="1" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.854a.5.5 0 0 1 .708 0l2.292 2.292a.5.5 0 0 1 0 .708l-9.193 9.193a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l9.193-9.193zM11.207 3L13 4.793 14.793 3 13 1.207 11.207 3zM10.5 3.707L2 12.207V14h1.793l8.5-8.5-1.793-1.793z"/>
                            </svg>
                        </button>';

                $btn .= '<button class="btn btn-outline-danger delete rounded-circle mx-1" data-id="'.$row->id.'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1" height="1" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg>
                        </button>';

                return $btn;
            })
                ->addColumn('tagihan', function($row){
                    return '<button class="btn btn-outline-info btn-sm rounded-circle tagihan" data-id="'.$row->id.'" data-toggle="modal" data-target="#tagihanModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                                    <path d="M8 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2v1a2 2 0 0 0 2-2v-1a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H8zm0 1h4a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H8V1zm-1 0H3a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h4V1z"/>
                                </svg>
                            </button>';
                })
                ->rawColumns(['action', 'tagihan']) // Menandai kolom yang mengandung HTML
                ->make(true);
        }
    }

    public function store(Request $request){
        
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'id_petugas' => 'required',
            'paket' => 'required',
        ]);

        Pelanggan::create([
            'nama_pelanggan' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_petugas' => $request->id_petugas,
            'paket' => $request->paket,
        ]);
        
        return redirect()->route('pelanggan');

    }

    public function edit($id)
    {
        // Ambil data pelanggan berdasarkan ID
        $pelanggan = Pelanggan::find($id);
    
        // Cek jika data pelanggan tidak ditemukan
        if (!$pelanggan) {
            return response()->json(['error' => 'Pelanggan tidak ditemukan'], 404);
        }
    
        // Kembalikan data pelanggan sebagai JSON
        return response()->json($pelanggan);
    }
    
    public function update(Request $request, $id)
    {
        

        
        $pelanggan = Pelanggan::find($id);
    
        if (!$pelanggan) {
            return response()->json(['error' => 'Pelanggan tidak ditemukan'], 404);
        }
    
       
        $pelanggan->update([
            'nama_pelanggan' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            
            'paket' => $request->paket,
        ]);
    
        return response()->json(['message' => 'Data pelanggan berhasil diperbarui', 'pelanggan' => $pelanggan]);
    }
    
    
    public function destroy($id){
        try {
            $pelanggan = Pelanggan::findOrFail($id); // Temukan data berdasarkan id
            $pelanggan->delete(); // Hapus data
    
            return response()->json(['success' => 'Data berhasil dihapus']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Gagal menghapus data'], 500);
        }
    }

    public function showDetail($id)
    {
        // Cari pelanggan berdasarkan ID dan sertakan relasi 'laporanTagihan' dan 'pembayaran' jika ada
        $pelanggan = Pelanggan::with('laporanTagihan.pembayaran')->find($id);
    
        // Jika pelanggan tidak ditemukan, kembalikan respons dengan status 404
        if (!$pelanggan) {
            return response()->json(['message' => 'Data not found'], 404);
        }
    
        // Inisialisasi data pembayaran
        $pembayaran = [];
    
        // Jika pelanggan memiliki laporan tagihan, ambil data pembayaran terkait
        if ($pelanggan->laporanTagihan->isNotEmpty()) {
            $pembayaran = Pembayaran::with('petugas')
                ->whereIn('id_tagihan', $pelanggan->laporanTagihan->pluck('id'))
                ->get();
        }
    
        // Siapkan respons dengan kondisi data yang ada
        $response = [
            'pelanggan' => $pelanggan,
            'pembayaran' => $pembayaran,
        ];
    
        return response()->json($response);
    }

    public function importJson(Request $request)
    {
        $data = $request->input('data');

        foreach ($data as $item) {
            // Cek apakah nama pelanggan sudah ada di database
            $existingPelanggan = Pelanggan::where('nama_pelanggan', $item['nama_pelanggan'])->first();

            if ($existingPelanggan) {
                // Jika nama pelanggan sudah ada, kirim response error
                return response()->json([
                    'message' => 'Data pelanggan sudah ada',
                    'nama_pelanggan' => $item['nama_pelanggan']
                ], 409); // HTTP status code 409 for conflict
            }

            // Jika nama pelanggan belum ada, buat data baru
            Pelanggan::create([
                'nama_pelanggan' => $item['nama_pelanggan'],
                'paket'          => $item['paket'],
                'alamat'         => $item['alamat'],
                'no_hp'          => $item['no_hp'],
                'id_petugas'     => Auth::id(),
            ]);
        }

        return response()->json(['message' => 'Data berhasil diimport!'], 200);
    }

    
    
    
    

}
