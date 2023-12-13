@extends('layouts.sidebarStaff')
@section('title', 'Daftar Mahasiswa Semhas')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Daftar Mahasiswa Seminar Hasil</h2>
</div>

<!-- Sale & Revenue Start -->
<div class="container bg-light shadow mt-5 py-5 px-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="col-sm-1">No. </th>
                <th scope="col" class="col-sm-2">NIM</th>
                <th scope="col" class="text-center">Judul</th>
                <th scope="col" class="col-sm-2">Enroll</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enrolls as $s)
            <tr>
                <th class="col-sm-1">{{ $no++ }}</th>
                <td class="col-sm-2">{{ $s->nim }}</td>
                <td class="text-center">{{ $s->judul }}</td>
                <td class="col-sm-2">
                    <a href="enroll/{{ $s->id }}/fix" class="btn btn-primary">Enroll</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
