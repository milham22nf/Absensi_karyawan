<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Absen;

class AbsenController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'Data Absen'
        ];
        return view('absen.index', $data);
    }
    public function absen(Request $request)
    {
        $user_id = Auth::user()->id;
        $date = date("y-m-d");
        $time = date("H:i:s");
        $note = $request->note;
        if (isset($request->btnIn)) {
            # code...
        } elseif ($request->btnOut) {
            # code...
        }
        return $request->all();
    }
}
