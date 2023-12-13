@extends('layouts.sidebar')
@section('title', 'Tentukan Judul')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Tentukan Judul</h2>
</div>

<!-- Sale & Revenue Start -->
<form class="form-horizontal" action="buatjudul" method="post" enctype="multipart/form-data">
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
                <th class="col-sm-2">Bidang</th>
                <td>:&nbsp;
                    <input type="text" value="" name="bidang" required>
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">Judul</th>
                <td>:&nbsp;
                    <input type="text" value="" name="judul" required>
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">Diajukan Oleh</th>
                <td>:
                    <input type="radio" id="dosen" name="diajukan_oleh" value="dosen">
                    <label for="dosen">Dosen</label><br>
                    <input type="radio" id="mahasiswa" name="diajukan_oleh" value="mahasiswa">
                    <label for="mahasiswa"> Mahasiswa</label><br>
                    <input type="radio" id="bersama" name="diajukan_oleh" value="bersama">
                    <label for="bersama"> Bersama</label><br>
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">Berkas uji laporan</th>
                <td>:&nbsp;
                    <input type="file" name="berkas_uji" value="" required> 
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
