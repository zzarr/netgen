<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanTagihan;
use App\Models\Pembayaran;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Auth;


class TagihanController extends Controller
{
    public function index(){
        $total = Pembayaran::sum('jumlah_pembayaran');
        return view('admin.tagihan.tagihan-detail', compact('total'));
    }

    public function datatable(Request $request)
{
    if ($request->ajax()) {
        $query = Pembayaran::with('laporantagihan.pelanggan');
        
        // Filter berdasarkan tanggal jika startDate dan endDate ada di request
        if ($request->filled('startDate') && $request->filled('endDate')) {
            $query->whereBetween('created_at', [$request->startDate, $request->endDate]);
        }

        $data = $query->get();

        return DataTables::of($data)
            ->make(true);
    }
}

    
    public function getTagihan($id)
    {
        // Daftar bulan dari Januari hingga Desember
        $months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        // Ambil data tagihan berdasarkan id_pelanggan
        $tagihan = LaporanTagihan::where('id_pelanggan', $id)->with('pembayaran')->get();
        $result = [];

        // Loop melalui setiap bulan
        foreach ($months as $month) {
            // Cari tagihan yang sesuai dengan nama bulan saat ini
            $tagihanBulan = $tagihan->firstWhere('bulan', $month);

            if ($tagihanBulan) {
                // Jika ada data tagihan di bulan tersebut, ambil pembayaran terakhirnya
                $latestPembayaran = $tagihanBulan->pembayaran()->latest()->first();
                if ($latestPembayaran) {
                    // Jika ada pembayaran, tampilkan nominal
                    $result[] = [
                        'bulan' => $month,
                        'nominal' => $latestPembayaran->jumlah_pembayaran
                    ];
                } else {
                    // Jika tidak ada pembayaran, tampilkan tombol bayar
                    $result[] = [
                        'bulan' => $month,
                        'nominal' => null
                    ];
                }
            } else {
                // Jika tidak ada tagihan, tambahkan tombol bayar
                $result[] = [
                    'bulan' => $month,
                    'nominal' => null,
                    
                ];
            }
        }

        // Kembalikan hasil dalam bentuk JSON
        return response()->json($result);
    }

    public function bayar(Request $request)
    {
        $request->validate([
            'bulan' => 'required',
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'nominal' => 'required|numeric|min:0.01',
            'kurang' => 'required|numeric' // Validasi nilai kurang
        ]);

        DB::beginTransaction();

        try {
            // Ambil data pelanggan untuk mendapatkan paket
            $pelanggan = Pelanggan::findOrFail($request->pelanggan_id);

            // Buat entri baru di tabel laporan_tagihan dengan nilai kurang dari form
            $is_lunas = $request->kurang <= 0;
            $laporanTagihan = LaporanTagihan::create([
                'id_pelanggan' => $request->pelanggan_id,
                'bulan' => $request->bulan,
                'paket' => $pelanggan->paket,
                'kurang' => $request->kurang,
                'is_lunas' => $is_lunas
            ]);

            // Tambahkan pembayaran di tabel pembayaran
            Pembayaran::create([
                'id_tagihan' => $laporanTagihan->id,
                'jumlah_pembayaran' => $request->nominal,
                'id_petugas' => Auth::id() 
            ]);

            DB::commit();
            return response()->json(['message' => 'Pembayaran berhasil disimpan.'], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function update($id){
        $tagihan = LaporanTagihan::where('id', $id)->select('kurang')->first();
        $kurang = (int) $tagihan->kurang;

        return response()->json($tagihan);
    }

    public function updateBayar(Request $request)
    {
        $request->validate([
            'nominal' => 'required|numeric|min:0.01',
            'id_tagihan' => 'required',
            'id_pembayaran' => 'required',
        ]);
    
        // Retrieve 'kurang' value from the LaporanTagihan model
        $kurang = LaporanTagihan::where('id', $request->id_tagihan)->select('kurang')->first();
        $nominal_sebelum = Pembayaran::where('id', $request->id_pembayaran)->select('jumlah_pembayaran')->first();
    
        // Validate if the payment nominal is greater than the 'kurang' value
        if ($request->nominal > $kurang->kurang) {
            return response()->json(['message' => 'Nominal pembayaran tidak boleh lebih besar dari kurang.'], 422);
        }
    
        DB::beginTransaction();
    
        try {
            // Update Pembayaran record with the new payment nominal
            Pembayaran::where('id', $request->id_pembayaran)->update([
                'jumlah_pembayaran' => $request->nominal + $nominal_sebelum->jumlah_pembayaran,
                'id_petugas' => Auth::id(),
            ]);
    
            // Calculate the remaining balance after payment
            $hasil = $kurang->kurang - $request->nominal;
    
            // Check if the payment settles the balance (hasil == 0)
            if ($hasil == 0) {
                LaporanTagihan::where('id', $request->id_tagihan)->update([
                    'kurang' => $hasil,
                    'is_lunas' => true,  // Mark as paid off
                ]);
            } else {
                LaporanTagihan::where('id', $request->id_tagihan)->update([
                    'kurang' => $hasil,
                ]);
            }
    
            DB::commit();
            return response()->json(['message' => 'Pembayaran berhasil disimpan.'], 200);
    
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
    
}
