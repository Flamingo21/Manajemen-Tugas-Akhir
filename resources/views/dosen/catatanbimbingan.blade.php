@extends('layouts.sidebarDosen')
@section('title', 'Catatan Bimbingan')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Catatan Bimbingan Mahasiswa</h2>
</div>

<!-- Sale & Revenue Start -->
<div class="container bg-light shadow mt-5 py-5 px-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="col-sm-1">No.</th>
                <th scope="col" class="col-sm-4">Nama</th>
                <th scope="col" class="col-sm-2">NIM</th>
                <th scope="col" class="col-sm-2">Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dospems as $s)
            <tr>
                <td class="col-sm-1">{{ $no++ }}</td>
                <th class="col-sm-4">{{ $s->nama }}</th>
                <td class="col-sm-2">{{ $s->nim }}</td>
                <td class="col-sm-2">
                    <a href="catatanbim/{{ $s->nim }}" class="btn btn-primary">Catatan</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
