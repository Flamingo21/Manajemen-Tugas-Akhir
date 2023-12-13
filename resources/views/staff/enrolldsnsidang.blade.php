@extends('layouts.sidebarStaff')
@section('title', 'Tambah Dosen Pembanding')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Tambah Dosen Pembanding Sidang</h2>
</div>

<!-- Sale & Revenue Start -->
<form class="form-horizontal" action="/staff/jadwalsidang/fix" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="container bg-light shadow mt-5 py-5 px-5">
    <table class="table table-sm table-borderless fs-5">
        <tbody>
            <tr>
                <th class="col-sm-2">Judul</th>
                <td>:&nbsp;&nbsp;
                    @foreach ($seminars as $sem => $s)
                        {{$s['judul']}}
                        <input type="hidden" name="id_prasidang" value="{{$s['id']}}" required>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">Dosen</th>
                <td>:&nbsp;
                    <select name="nidn" id="nidn"
                        onChange="getSubCat(this.value);" required>
                        <option value="">Pilih Dosen Pembanding</option>
                        @foreach ($dsn as $d)
                        <option value="{{$d->nidn}}">{{$d->nama}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="d-flex justify-content-end me-3">
        <button type="submit" class="col-sm-1 btn btn-primary "
        name="submit">
        Ajukan
        </button>
    </div>
</div>
</form>
@endsection
