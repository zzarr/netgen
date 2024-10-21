<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanTagihan extends Model
{
    protected $table = 'laporan_tagihan';
    protected $fillable = ['id_pelanggan', 'bulan', 'paket', 'kurang', 'is_lunas'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
}
