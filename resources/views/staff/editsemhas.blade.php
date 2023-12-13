@extends('layouts.sidebarStaff')
@section('title', 'Edit Seminar')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Edit Seminar Hasil</h2>
</div>

<!-- Sale & Revenue Start -->
<form class="form-horizontal" action="editsemhasfix" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="container bg-light shadow mt-5 py-5 px-5">
    <table class="table table-sm table-borderless fs-5">
        <tbody>
            <tr>
                <th class="col-sm-2">Tanggal</th>
                <td>:&nbsp;
                    <input type="date" value="" name="tanggal" required>
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">Jam</th>
                <td>:&nbsp;
                    <input type="time" value="" name="jam" required>
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">Tempat</th>
                <td>:&nbsp;
                    <input type="text" value="" name="tempat" required>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="d-flex justify-content-end me-3">
        <button type="submit" class="col-sm-1 btn btn-primary "
        name="submit">
        Ajukan
        </button>
    </div>
</div>
</form>
@endsection
