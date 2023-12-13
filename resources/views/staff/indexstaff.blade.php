@extends('layouts.sidebarStaff')
@section('title', 'Home')
@section('content')


<div class="container mt-5">
    <h1>Daftar Mahasiswa</h1>
    <br>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-5 bg-light shadow py-5 mt-3 mx-3">
            <div class="row justify-content-center d-flex gap-2">
                <h4 class="text-center">Baru Didaftarkan</h4>
                <a href="/staff/tampilmhsbaru" class="btn btn-primary  col-4 ">Lihat</a>
            </div>
        </div>
        <div class="col-5 bg-light shadow py-5 mt-3 mx-3">
            <div class="row justify-content-center d-flex gap-2">
                <h4 class="text-center">Pra-Sempro</h4>
                <a href="/staff/tampilmhssempro" class="btn btn-primary  col-4 ">Lihat</a>
            </div>
        </div>
        <div class="col-5 bg-light shadow py-5 mt-3 mx-3">
            <div class="row justify-content-center d-flex gap-2">
                <h4 class="text-center">Pra-Semhas</h4>
                <a href="/staff/tampilmhssemhas" class="btn btn-primary  col-4 ">Lihat</a>
            </div>
        </div>
        <div class="col-5 bg-light shadow py-5 mt-3 mx-3">
            <div class="row justify-content-center d-flex gap-2">
                <h4 class="text-center">Pra-Sidang</h4>
                <a href="/staff/tampilmhssidang" class="btn btn-primary  col-4 ">Lihat</a>
            </div>
        </div>
        <div class="col-5 bg-light shadow py-5 mt-3 mx-3">
            <div class="row justify-content-center d-flex gap-2">
                <h4 class="text-center">Pasca-Sidang</h4>
                <a href="/staff/tampilmhspasca" class="btn btn-primary  col-4 ">Lihat</a>
            </div>
        </div>
    </div>
</div>
@endsection
