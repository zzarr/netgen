<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenHubHtbController extends Controller
{
    public function index()
    {
        return view('admin.manajemenhubhtb');
    }
    // public function create()
    // {
    //     return view('admin.addmanajemenhubhtb');
    // }
}
