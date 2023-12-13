@extends('layouts.sidebarStaff')
@section('title', 'Tambah Mahasiswa')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Buat Akun Mahasiswa</h2>
</div>

<!-- Sale & Revenue Start -->
{{ csrf_field() }}
<div class="container bg-light shadow mt-5 py-5 px-5">
    <form class="form-horizontal" method="POST" action="/import_parse" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">
            <label for="csv_file" class="col-md-4 control-label">CSV file to import</label>

            <div class="col-md-6">
                <input id="csv_file" type="file" class="form-control" name="csv_file" required>

                @if ($errors->has('csv_file'))
                <span class="help-block">
                    <strong>{{ $errors->first('csv_file') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <br>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Import CSV
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>

@endsection
