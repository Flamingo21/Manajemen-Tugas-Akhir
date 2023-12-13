@extends('layouts.sidebar')
@section('title', 'Bimbingan Seminar')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Bimbingan Seminar Proposal</h2>
</div>

<!-- Sale & Revenue Start -->
<div class="container bg-light shadow mt-5 py-5 px-5">
    <!--
    <div class="d-flex justify-content-end me-3 mb-4">
        <button type="submit" class="btn btn-primary">Upload File</button>
    </div>
    -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="col-sm-2">Tanggal</th>
                <th scope="col" class="col-sm-2">Dosen</th>
                <th scope="col" class="text-center">Isi Catatan</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($bims as $b)
            <tr>
                <td class="col-sm-2">{{ $b->created_at }}</th>
                <td class="col-sm-2">{{ $b->namadsn }}</td>
                <td class="ps-4">{{ $b->catatan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!--
    <div class="row mt-5">
        <p class="fs-4">Status Bimbingan</p>
        <p class="">Dosen 1 : Disetujui</p>
        <p class="">Dosen 2 :Ditolak</p>
    </div>
    -->
</div>
@endsection
