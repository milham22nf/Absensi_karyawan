@extends('template/main')

@section('views')
<table class="table table-bordered" id="table">
    <thead>
    <tr>
    <th style="width: 10px"><font style="vertical-align: inherit;">No.</font></th>
    <th><font style="vertical-align: inherit;">Provinsi</font></th>
    <th width="250px"><font style="vertical-align: inherit;">Opsi</font></th>
    </tr>
    </thead>
    @php
        $no = 1;
    @endphp
    @foreach ($provinsi as $item)
    <tbody>
    <tr>
    <td>{{ $no++  }}</td>
    <td>{{ $item->nm_provinsi }}</td>
    <td style="width: 19%" >
        <button class="btn btn-info float-left" name="edit">
            <a style="color: black;" href ="edit_catatan.php? "><i class="fa fa-edit"></i> EDIT</a>
        </button>
        <button class="btn btn-warning float-right" >
            <a style="color: black;" href ="hapus.php?"><i class="fa fa-eraser"></i> HAPUS</a>
        </button>
    </td>
    </tr>
    </tbody>
    @endforeach  
    </table>
@endsection
