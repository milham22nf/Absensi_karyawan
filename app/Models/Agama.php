<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Agama extends Model
{
    use HasFactory;
    protected $table = 'agama';
    protected $primaryKey = 'id_agama';
    protected $fillable = ['id_agama', 'agama'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table);

        if ($request->get('cari') != '') {
            $this->dt->where('agama', 'like', $request->get('cari'));
        }

        return $this->dt;
    }
}
