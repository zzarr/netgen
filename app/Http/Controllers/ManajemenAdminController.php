<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenAdminController extends Controller
{
    public function index()
    {
        return view('admin.manajemenadmin');
    }
    public function create()
    {
        return view('admin.addadmin');
    }
}
