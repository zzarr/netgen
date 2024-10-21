<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenTeknisiController extends Controller
{
    public function index()
    {
        return view('admin.manajementeknisi');
    }
}
