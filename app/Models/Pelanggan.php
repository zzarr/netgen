<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    use HasFactory;
    protected $fillable = ['nama_pelanggan', 'id_petugas', 'paket', 'alamat', 'no_hp'];

    public function petugas()
    {
        return $this->belongsTo(User::class, 'id_petugas');
    }

    public function laporanTagihan()
    {
        return $this->hasMany(LaporanTagihan::class, 'id_pelanggan');
    }
}
