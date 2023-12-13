@extends('layouts.sidebarStaff')
@section('title', 'Daftar Seminar')
@section('content')

<div class="container mt-5">
    <h1>Daftar Seminar</h1>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-5 bg-light shadow py-5 mt-3 mx-3">
            <div class="row justify-content-center d-flex gap-2">
                <h4 class="text-center">Seminar Proposal</h4>
                <a href="jadwalsempro" class="btn btn-primary  col-4 ">Lihat</a>
            </div>
        </div>
        <div class="col-5 bg-light shadow py-5 mt-3 mx-3">
            <div class="row justify-content-center d-flex gap-2">
                <h4 class="text-center">Seminar Hasil</h4>
                <a href="jadwalsemhas" class="btn btn-primary  col-4 ">Lihat</a>
            </div>
        </div>
        <div class="col-5 bg-light shadow py-5 mt-3 mx-3">
            <div class="row justify-content-center d-flex gap-2">
                <h4 class="text-center">Sidang</h4>
                <a href="jadwalsidang" class="btn btn-primary  col-4 ">Lihat</a>
            </div>
        </div>

    </div>
</div>
@endsection
