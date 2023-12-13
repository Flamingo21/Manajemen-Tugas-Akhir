@extends('layouts.sidebarStaff')
@section('title', 'Mahasiswa')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Daftar Mahasiswa</h2>
    <h4>Berikut daftar mahasiswa yang sudah menyelesailan sidang meja hijau</h4>
</div>

<!-- Sale & Revenue Start -->
<div class="container bg-light shadow mt-5 py-5 px-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="col-sm-1">No.</th>
                <th scope="col" class="col-sm-2">Nama</th>
                <th scope="col" class="col-sm-2">NIM</th>
                <!--
                <th scope="col" class="col-sm-2">Edit</th>
                -->
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $s)
            <tr>
                <td class="col-sm-1">{{ $no++ }}.</td>
                <th class="col-sm-2">{{ $s->nim }}</th>
                <td class="col-sm-2">{{ $s->nama }}</td>
                <!--
                <td class="col-sm-2">
                    <a href="jadwalsempro/{{ $s->id }}/ubah" class="btn btn-primary">Edit</a>
                </td>
                -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
