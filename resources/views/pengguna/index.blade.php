@extends('template/main')

@section('views')
<div class="row">
    <div class="col-lg-8">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <div id="flashdata"></div>
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col-6">
                        <div class="input-group">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="float-right">
                            <a href="{{url("pengguna/form")}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered" id="table" style="width: 100%; border: 20px;">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>User name</th>
                            <th>Nama lengkap</th>
                            <th>Password</th>
                            <th class="text-center" style="width: 5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection