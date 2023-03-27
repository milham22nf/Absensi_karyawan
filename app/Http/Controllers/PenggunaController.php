<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Pengguna;

class PenggunaController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Pengguna',
        ];
            return view ('pengguna.index', $data);
    }

    public function form()
    {
        $data = [
            'title'    => 'Form Pengguna',
            'table' =>  'pengguna',
        ];
        return view('pengguna.form', $data);
    }

    public function store(Request $request)
    {
        $data = [
            "username" => $request->username,
            "password" => $request->password,
            "nama_lengkap" => $request->nama_lengkap,
        ];
        pengguna::create($data);
        return view('pengguna.index');
    }
}
