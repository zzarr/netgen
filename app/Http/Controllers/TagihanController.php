<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanTagihan;
use App\Models\Pembayaran;
class TagihanController extends Controller
{
    public function getTagihan($id)
{
    // Daftar bulan dari Januari hingga Desember
    $months = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    // Mengambil data tagihan berdasarkan pelanggan_id
    $tagihan = LaporanTagihan::where('id_pelanggan', $id)->get()->keyBy('bulan'); // Mengelompokkan berdasarkan bulan

    $result = [];

    // Loop melalui setiap bulan untuk memastikan tiap bulan ada di hasil
    foreach ($months as $index => $month) {
        $tagihanBulan = $tagihan->get($index + 1); // Bulan di DB mungkin berbasis 1-12
        if ($tagihanBulan) {
            // Jika ada data tagihan di bulan tersebut
            $result[] = [
                'bulan' => $month,
                'nominal' => $tagihanBulan->nominal,
            ];
        } else {
            // Jika tidak ada data tagihan, tambahkan tombol bayar
            $result[] = [
                'bulan' => $month,
                'nominal' => null, // Nominal kosong
            ];
        }
    }

    // Kembalikan hasil dalam bentuk JSON
    return response()->json($result);
}

}
