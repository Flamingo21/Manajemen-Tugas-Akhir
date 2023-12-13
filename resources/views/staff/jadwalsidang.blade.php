@extends('layouts.sidebarStaff')
@section('title', 'Jadwal Sidang')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Jadwal Sidang</h2>
</div>

<!-- Sale & Revenue Start -->
<div class="container bg-light shadow mt-5 py-5 px-5">
    <div class="d-flex justify-content-end me-3 mb-4">
        <a href="/staff/buatsidangbaru" class="btn btn-primary">Buat Seminar</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="col-sm-1">No.</th>
                <th scope="col" class="col-sm-2">Tanggal</th>
                <th scope="col" class="col-sm-1">Jam</th>
                <th scope="col" class="col-sm-2">Tempat</th>
                <th scope="col" class="col-sm-1">Mahasiswa</th>
                <th scope="col" class="col-sm-1">Edit</th>
                <th scope="col" class="col-sm-2">Berkas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sidangss as $s)
            <tr>
                <td class="col-sm-1">{{ $no++ }}</td>
                <th class="col-sm-2">{{ $s->tanggal }}</th>
                <td class="col-sm-1">{{ $s->jam }}</td>
                <td class="col-sm-2">{{ $s->tempat }}</td>
                <td class="col-sm-1">
                    <a href="jadwalsidang/{{ $s->id }}/mhs" class="btn btn-primary">Mahasiswa</a>
                </td>
                <td class="col-sm-1">
                    <a href="jadwalsidang/{{ $s->id }}/ubah" class="btn btn-primary">Edit</a>
                </td>
                <td class="col-sm-2">
                    <a href="cetak_jadwalsidang/{{ $s->id }}" class='btn btn-primary' target="_blank">Download Berkas</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
