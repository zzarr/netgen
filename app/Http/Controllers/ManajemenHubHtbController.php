<?php

namespace App\Http\Controllers;
use App\Models\HubHtb;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ManajemenHubHtbController extends Controller
{
    public function index()
    {
        return view('admin.manajemenhubhtb');
    }
    public function datatable(Request $request){
        {
            $data = HubHtb::query();
            return DataTables::of($data)->make(true);
        }
    }
}

