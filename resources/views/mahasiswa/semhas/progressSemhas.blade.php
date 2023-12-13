@extends('layouts.sidebar')
@section('title', 'Progress Semhas')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Progress Seminar Hasil</h2>
</div>

<!-- Sale & Revenue Start -->
<div class="container bg-light shadow mt-5 py-5 px-5">
    <div class="d-flex justify-content-end me-3 mb-4">
        <!--
        <a href="/mahasiswa/buatjudulbaru" class="btn btn-primary">Buat Judul</a>
        -->
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="col-sm-4">Judul</th>
                <th scope="col" class="col-sm-2">Status</th>
                <th scope="col" class="col-sm-2">Jadwal</th>
                <th scope="col" class="col-sm-2">Berkas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($semhas as $s)
            <tr>
                <th class="col-sm-4">{{ $s->judul }}</th>
                <td class="col-sm-2">{{ $s->status }}</td>
                <td class="col-sm-2">
                    <a href="jadwalsemhas/{{ $s->id }}" class="btn btn-primary">Jadwal</a>
                </td>
                <td class="col-sm-2">
                    <a href="berkassemhas/{{ $s->id }}/upload" class="btn btn-primary">Upload Berkas</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
