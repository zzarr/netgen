<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // Memperbaiki 'retun' menjadi 'return'
    }

    public function teknisiDashboard()
    {
        return view('teknisi.dashboard');
    }
}
