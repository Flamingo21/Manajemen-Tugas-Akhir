@extends('layouts.sidebarDosen')
@section('title', 'Daftar Mahasiswa Sempro')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Daftar Mahasiswa Seminar Proposal</h2>
</div>

<!-- Sale & Revenue Start -->
<div class="container bg-light shadow mt-5 py-5 px-5">
    <!--
    <div class="d-flex justify-content-end me-3 mb-4">
        <a href="buatjudul.html" class="btn btn-primary">Tambah Mahasiswa</a>
    </div>
    -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="col-sm-1">No. </th>
                <th scope="col" class="col-sm-2">NIM</th>
                <th scope="col" class="text-center">Judul</th>
                <th scope="col" class="col-sm-2">Beri Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($seminar as $s)
            <tr>
                <th class="col-sm-1">{{ $no++ }}</th>
                <td class="col-sm-2">{{ $s->nama }}</td>
                <td class="text-center">{{ $s->judul }}</td>
                <td class="col-sm-2">
                    <div class="d-flex justify-content-around">
                        <a href="bandingsempro/{{ $s->id_prasempro }}" class="btn btn-primary">Beri Nilai</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
