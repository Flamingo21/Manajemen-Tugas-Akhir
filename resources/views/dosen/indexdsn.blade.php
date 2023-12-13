@extends('layouts.sidebarDosen')
@section('title', 'Home')
@section('content')


<div class="container mt-5">
    @foreach ($dosen as $dsn => $d)
    <h1>Hai, {{$d['nama']}}</h1>
    @endforeach
    <h4>Daftar mahasiswa bimbingan Anda</h4>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-5 bg-light shadow py-5 mt-3 mx-3">
            <div class="row justify-content-center d-flex gap-2">
                <h4 class="text-center">Pra-Sempro</h4>
                <a href="/dosen/dftrmhssempro" class="btn btn-primary  col-4 ">Lihat</a>
            </div>
        </div>
        <div class="col-5 bg-light shadow py-5 mt-3 mx-3">
            <div class="row justify-content-center d-flex gap-2">
                <h4 class="text-center">Pra-Semhas</h4>
                <a href="/dosen/dftrmhssemhas" class="btn btn-primary  col-4 ">Lihat</a>
            </div>
        </div>
        <div class="col-5 bg-light shadow py-5 mt-3 mx-3">
            <div class="row justify-content-center d-flex gap-2">
                <h4 class="text-center">Pra-Sidang</h4>
                <a href="/dosen/dftrmhssidang" class="btn btn-primary  col-4 ">Lihat</a>
            </div>
        </div>
    </div>
</div>
@endsection
