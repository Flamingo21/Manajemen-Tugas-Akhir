@extends('layouts.sidebarStaff')
@section('title', 'Home')
@section('content')


<div class="container mt-5">
    <h1>Daftar Dosen Pembimbing</h1>
    <br>
</div>
<div class="container bg-light shadow mt-5 py-5 px-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="col-sm-1">No.</th>
                <th scope="col" class="col-sm-2">NIM</th>
                <th scope="col" class="col-sm-2">Nama</th>
                <th scope="col" class="col-sm-2">Dosen Pembimbing</th>
                <!--
                <th scope="col" class="col-sm-2">Tempat</th>
                <th scope="col" class="col-sm-2">Edit</th>
                -->
            </tr>
        </thead>
        <tbody>
            @foreach ($mahas as $s)
            <tr>
                <td class="col-sm-1">{{ $no++ }}</td>
                <th class="col-sm-2">{{ $s->nim }}</th>
                <th class="col-sm-2">{{ $s->nama }}</th>
                <!--
                <td class="col-sm-2">{{ $s->jam }}</td>
                <td class="col-sm-2">{{ $s->tempat }}</td>
                <td class="col-sm-2">
                    <a href="jadwalsemhas/{{ $s->id }}/ubah" class="btn btn-primary">Edit</a>
                </td>
                -->
                <td class="col-sm-2">
                    <a href="detaildospem/{{ $s->nim }}/detail" class="btn btn-primary">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection