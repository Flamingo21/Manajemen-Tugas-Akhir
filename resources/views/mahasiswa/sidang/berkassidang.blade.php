@extends('layouts.sidebar')
@section('title', 'Berkas Sidang')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Upload Berkas Sidang</h2>
</div>

<!-- Sale & Revenue Start -->
<form class="form-horizontal" action="uploadsidangfix" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="container bg-light shadow mt-5 py-5 px-5">
    <table class="table table-sm table-borderless fs-5">
        <tbody>
            <tr>
                <th class="col-sm-2">Nama</th>
                <td>:&nbsp;&nbsp;
                    @foreach ($mahas as $maha => $m)
                        {{$m['nama']}}
                    @endforeach
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">NIM</th>
                <td>:&nbsp;&nbsp;
                    @foreach ($mahas as $maha => $m)
                        {{$m['nim']}}
                        <input type="hidden" name="nim" value="{{$m['nim']}}" />
                    @endforeach
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">Berkas Seminar Hasil</th>
                <td>:&nbsp;
                    <input type="file" name="berkas_sidang" value="" required> 
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
