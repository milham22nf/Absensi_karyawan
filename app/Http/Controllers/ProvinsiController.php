<?php

namespace App\Http\Controllers;

use yajra\DataTables\Facades\Datatables;
use Illuminate\Support\Facades\DB;
use App\Models\Agama as ModelsProvinsi;
use Illuminate\Http\Request;
use App\Models\provinsi;

class ProvinsiController extends Controller
{
    public function index()
    {
        $data = [
        'title' => 'Data Provinsi',
    ];
        return view ('provinsi.index', $data)->with([
            'provinsi' => provinsi::all(),
        ]);
    }
}
