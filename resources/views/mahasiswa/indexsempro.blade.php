@extends('layouts.sidebar')
@section('title', 'Pra-Sempro')
@section('content')

<div class="container mt-5">
    <h1>Pra-Seminar Proposal</h1>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-5 bg-light shadow py-5 mt-3 mx-3">
            <div class="row justify-content-center d-flex gap-2">
                <h4 class="text-center">Pembimbing</h4>
                <a href="calonbimbing" class="btn btn-primary  col-4 ">Lihat</a>
            </div>
        </div>
        <div class="col-5 bg-light shadow py-5 mt-3 mx-3">
            <div class="row justify-content-center d-flex gap-2">
                <h4 class="text-center">Progress</h4>
                <a href="progressempro" class="btn btn-primary  col-4 ">Lihat</a>
            </div>
        </div>

    </div>
</div>
@endsection
