@extends('layouts.sidebarDosen')
@section('title', 'Jadwal Sidang')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Jadwal Sidang</h2>
</div>

<!-- Sale & Revenue Start -->
<div class="container bg-light shadow mt-5 py-5 px-5">
    <div class="d-flex justify-content-end me-3 mb-4">
        <button type="submit" class="btn btn-primary">Upload File</button>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Jenis</th>
                <th scope="col">Tempat</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jam</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1222</th>
                <td>Rido</td>
                <td>oke</td>
                <td>oke</td>
            </tr>
        </tbody>
    </table>

</div>
@endsection
