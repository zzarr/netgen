<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $fillable = ['nama_pelanggan', 'id_teknisi', 'paket', 'alamat', 'no_hp'];

    public function teknisi()
    {
        return $this->belongsTo(User::class, 'id_teknisi');
    }

    public function laporanTagihan()
    {
        return $this->hasMany(LaporanTagihan::class, 'id_pelanggan');
    }
}
