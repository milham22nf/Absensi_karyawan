<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Provinsi'
        ];
        return view('provinsi.index', $data);
    }
}
