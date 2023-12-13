@extends('layouts.sidebarDosen')
@section('title', 'Buat Bimbingan')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Tambahkan Catatan Bimbingan</h2>
</div>

<!-- Sale & Revenue Start -->
<form class="form-horizontal" action="fix" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="container bg-light shadow mt-5 py-5 px-5">
    <table class="table table-sm table-borderless fs-5">
        <tbody>
            <tr>
                <th class="col-sm-2">Nama</th>
                <td>:&nbsp;&nbsp;
                    @foreach ($mhs as $maha => $m)
                        {{$m['nama']}}
                        <input type="hidden" name="nim" value="{{$m['nim']}}" />
                    @endforeach
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">NIM</th>
                <td>:&nbsp;&nbsp;
                    @foreach ($dsn as $ds => $d)
                        {{$d['nama']}}
                        <input type="hidden" name="nidn" value="{{$d['nidn']}}" />
                    @endforeach
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">Catatan</th>
                <td>:&nbsp;
                    <input type="text" value="" maxlength="500" name="catatan" required>
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
