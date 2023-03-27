<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class provinsi extends Model
{
    use HasFactory ;

    protected $table = 'provinsi'; 
    protected $primaryKey = 'id_provinsi';
}
?>