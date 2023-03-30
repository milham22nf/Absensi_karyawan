@extends('template/main')

@section('views')
<div class="row">
    <div class="col-lg-6 col-12">
        <div class="card">
            <form action="{{url("agama")}}" method="POST" id="form">
                <div class="card-header">
                    <a href="{{url("agama")}}" class="btn btn-warning"><i class="fas fa-chevron-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-success float-end"><i class="fas fa-save"></i> Simpan</button>
                </div>
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="id" value="{{@$data['id_agama']}}">
                    <div class="form-group">
                        <label for="">Agama</label>
                        <input type="text" class="form-control" name="agama" placeholder="Masukan Agama yang akan ditambahkan"
                            value="{{old('agama', @$data['agama'])}}" required>
                        <input type="hidden" name="agama_lama" value="{{@$data['agama']}}">
                        @error('agama')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#form").validate({
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    })
</script>
@endsection
