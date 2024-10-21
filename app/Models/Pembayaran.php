<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $fillable = ['id_tagihan', 'jumlah_pembayaran'];

    public function laporanTagihan(){
        return $this->belongsTo(LaporanTagihan::class, 'id_tagihan');
    }
}
