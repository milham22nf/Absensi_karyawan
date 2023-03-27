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
                            <input type="text" name="cari" class="form-control" id="form-search" placeholder="Cari data agama">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="button" id="btn-search" onclick="reload()">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="float-right">
                            <a href="{{url("agama/form")}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered" id="table" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Agama</th>
                            <th class="text-center" style="width: 5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
	var table
	$(function() {
		table = $('#table').DataTable({
			processing: true,
			serverSide: true,
			searching: false,
			ajax: {
				url: '{!! route("agama.listData") !!}',
				method: 'post',
				data: (data) => {
					data._token = '{{csrf_token()}}'
					data.search_pengguna = $("#form-search").val()
				}
			},
			"columnDefs": [{
				"orderable": false,
				"targets": [0],
			}],
			columns: [
        {
          data: 'DT_RowIndex',
          name: 'DT_RowIndex',
          orderable: false,
          searchable: false
        },
        {
          data: 'agama'
        },
        {
          data: 'action',
        }
      ]
		});
	});

	const reload = () => {
		table.ajax.reload()
	}

	$(document).keyup(function(event) {
		if ($("#form-search").is(":focus") && event.key == "Enter") {
			reload()
		}
	});
</script>
@endsection
