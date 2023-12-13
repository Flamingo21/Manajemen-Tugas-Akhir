@extends('layouts.sidebarDosen')
@section('title', 'Daftar Mahasiswa Sempro')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Daftar Mahasiswa Seminar Proposal</h2>
</div>

<!-- Sale & Revenue Start -->
<div class="container bg-light shadow mt-5 py-5 px-5">
    <div class="d-flex justify-content-end me-3 mb-4">
        <a href="buatjudul.html" class="btn btn-primary">Tambah Mahasiswa</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="col-sm-2">Judul</th>
                <th scope="col" class="col-sm-2">Status</th>
                <th scope="col" class="text-center">Action</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th class="col-sm-2">1222</th>
                <td class="col-sm-2">Rido</td>
                <td class="ps-4">
                    <div class="d-flex justify-content-around">
                        <a href="tentukanjudul.html" class="btn btn-primary">Uji Hasil</a>
                        <a href="jadwal.html" class="btn btn-primary">Bimbingan</a>
                        <a href="jadwal.html" class="btn btn-primary">jadwal</a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

</div>
@endsection
