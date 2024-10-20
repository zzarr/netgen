<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operasional extends Model
{
    protected $table = 'operasional';
    protected $fillable = ['tanggal', 'keterangan', 'kategori', 'jumlah'];
}

