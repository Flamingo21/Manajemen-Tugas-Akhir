@extends('layouts.sidebar')

@section('title', 'index')


@section('content')
<div class="container mt-5">
    @foreach ($mahas as $maha => $m)
        <h2>Selamat datang, {{$m['nama']}}</h2>
        <h4></h4>
    @endforeach
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-5 bg-light shadow py-5 mt-3 mx-3">
            <div class="row justify-content-center d-flex gap-2">
                <h4 class="text-center">Pra-seminar</h4>
                <a href="mahasiswa/indexsempro" class="btn btn-primary  col-4 ">Lihat</a>
            </div>
        </div>
        <div class="col-5 bg-light shadow py-5 mt-3 mx-3">
            <div class="row justify-content-center d-flex gap-2">
                <h4 class="text-center">Pra-semhas</h4>
                <a href="mahasiswa/indexsemhas" class="btn btn-primary  col-4 ">Lihat</a>
            </div>
        </div>
        <div class="col-5 bg-light shadow py-5 mt-3 mx-3">
            <div class="row justify-content-center d-flex gap-2">
                <h4 class="text-center">Pra-sidang</h4>
                <a href="mahasiswa/indexsidang" class="btn btn-primary  col-4 ">Lihat</a>
            </div>
        </div>
        <div class="col-5 bg-light shadow py-5 mt-3 mx-3">
            <div class="row justify-content-center d-flex gap-2">
                <h4 class="text-center">Pasca Sidang</h4>
                <a href="" class="btn btn-primary  col-4 ">Lihat</a>
            </div>
        </div>
    </div>
</div>
@endsection




