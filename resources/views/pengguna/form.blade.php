@extends('template.main')

@section('views')
@csrf
<form class="form-horizontal" action="{{ url("pengguna") }}" method="post">
  <div class="row">
    <div class="col-lg-10 col-12">
  <div class="card">
    <div class="card-body">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">User Name</label>
        <div class="col-sm-10">
          <input type="text" name="username" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="text" name="password" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama lengkap</label>
        <div class="col-sm-10">
          <input type="text" name="nama_lengkap" class="form-control">
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-success float-right m-2"><i class="fa fa-save"></i> Simpan</button>
      <a href="{{ url("pengguna") }}" class="btn btn-warning float-right m-2"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
  </div>
  </div>
</div>
@method('post')
</form>
@endsection