<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antena extends Model
{
    protected $table = 'antena';
    protected $fillable = ['nama', 'IP', 'alamat', 'username', 'password'];
}

