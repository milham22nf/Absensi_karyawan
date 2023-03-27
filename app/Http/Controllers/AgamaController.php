<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Agama as ModelsAgama;

class AgamaController extends Controller
{
    public function __construct()
    {
        $this->model = new ModelsAgama();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Agama'
        ];
        return view('agama.index', $data);
    }

    public function listData(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->model->getDatatables($request);
            return Datatables::of($db)
                ->addColumn('action', function ($row) {
                    $btn = '<div>';
                    $btn .= '<button type="button" class="btn btn-default" data-toggle="dropdown">';
                    $btn .= '<i class="fas fa-bars"></i>';
                    $btn .= '</button>';
                    $btn .= '<div class="dropdown-menu" role="menu">';
                    $btn .= '<a href="' . url('agama/form/' . base64_encode($row->id_agama)) . '" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>';
                    $btn .= '<form action="' . url('agama/delete/' . base64_encode($row->id_agama)) . '" method="post">';
                    $btn .= csrf_field();
                    $btn .= '<button type="submit" class="dropdown-item" onclick="return confirm(' . "'Ingin dihapus?'" . ')"><i class="fas fa-trash"></i> Hapus</button>';
                    $btn .= '</form>';
                    $btn .= '</div>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function form(String $id = null)
     {
         $data = [
             'title'    => 'Form Agama',
             'data'     => $this->model->find(base64_decode($id))
         ];
         return view('agama.form', $data);
     }


     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
    public function store(Request $request)
    {
        $id = $request->get('id');
        if ($id == null) {

            $validate = $request->validate([
                'agama'      => ['required', 'unique:agama'],
            ]);

            $this->model->create($validate);
            return redirect('agama')->with('success', 'Berhasil simpan');
        } else {
            $validate['agama'] = $request->get('agama');

            $this->model->where('id_agama', $id)->update($validate);

            return redirect('agama')->with('success', 'Berhasil perbarui');
        }
    }
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
    public function destroy(Request $request, $id)
    {
        $this->model->where('id_agama', base64_decode($id))->delete();
        return redirect('agama')->with('success', 'Berhasil dihapus');
    }
}
