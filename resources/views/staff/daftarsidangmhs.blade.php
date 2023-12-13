@extends('layouts.sidebarStaff')
@section('title', 'Daftar Mahasiswa Sidang')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Daftar Mahasiswa Sidang</h2>
</div>

<!-- Sale & Revenue Start -->
<div class="container bg-light shadow mt-5 py-5 px-5">

    <div class="d-flex justify-content-end me-3 mb-4">
        <a href="enroll" class="btn btn-primary">Daftarkan Mahasiswa</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="col-sm-1">No. </th>
                <th scope="col" class="col-sm-2">NIM</th>
                <th scope="col" class="text-center">Judul</th>
                <th scope="col" class="col-sm-2">Dosen Pembanding</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($seminars as $s)
            <tr>
                <th class="col-sm-1">{{ $no++ }}</th>
                <td class="col-sm-2">{{ $s->nim }}</td>
                <td class="text-center">{{ $s->judul }}</td>
                <td class="col-sm-2">
                    <a href="dsnbanding/{{ $s->id }}/{{ $s->nim }}" class="btn btn-primary">Dosen</a>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
