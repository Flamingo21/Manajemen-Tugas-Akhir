@extends('layouts.sidebarStaff')
@section('title', 'Daftar Dosen Pembanding')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Daftar Dosen Pembanding</h2>
    @foreach($mhs as $m)
    <h5>Nama Mahasiswa : {{$m->nama}} </h5>
    @endforeach
    @foreach($seminars as $s)
    <h5>Judul : {{$s->judul}}</h5>
    @endforeach
</div>

<!-- Sale & Revenue Start -->
<div class="container bg-light shadow mt-5 py-5 px-5">
    <div class="d-flex justify-content-end me-3 mb-4">
        @foreach($seminars as $s)
        <a href="/staff/jadwalsidang/{{$s->id}}/enrolldsn" class="btn btn-primary">Tambah Dosen Pembanding</a>
        @endforeach
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="col-sm-1">No. </th>
                <th scope="col" class="col-sm-2">NIDN</th>
                <th scope="col" class="text-center">Nama</th>
                <!--
                <th scope="col" class="col-sm-2">Dosen Pembanding</th>
                -->
            </tr>
        </thead>
        <tbody>
            @foreach ($banding as $s)
            <tr>
                <th class="col-sm-1">{{ $no++ }}</th>
                @foreach($dsn as $d)
                @if($s->nidn==$d->nidn)
                <td class="col-sm-2">{{ $d->nidn }}</td>
                <td class="text-center">{{ $d->nama }}</td>
                @endif
                @endforeach
                <!--
                <td class="col-sm-2">
                    <a href="dsnbanding/{{ $s->nim }}" class="btn btn-primary">Dosen</a>
                </td>
                -->
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
