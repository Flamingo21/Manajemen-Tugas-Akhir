@extends('layouts.sidebar')
@section('title', 'Buat Nilai')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Buat Nilai</h2>
</div>

<!-- Sale & Revenue Start -->
<form class="form-horizontal" action="buatnilai" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="container bg-light shadow mt-5 py-5 px-5">
    <table class="table table-sm table-borderless fs-5">
        <tbody>
            <tr>
                <th class="col-sm-2">Nama</th>
                <td>:&nbsp;&nbsp;
                    @foreach ($banding as $ban => $b)
                        {{$b['nama']}}
                    @endforeach
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">Judul</th>
                <td>:&nbsp;&nbsp;
                    @foreach ($banding as $ban => $b)
                        {{$b['judul']}}
                    @endforeach
                </td>
            </tr>
            @foreach ($banding as $ban => $b)
                        <input type="hidden" name="id_prasempro" value="{{$b['id_prasempro']}}" />
            @endforeach
            @foreach ($banding as $ban => $b)
            <input type="hidden" name="nidn" value="{{$b['nidn']}}" />
            @endforeach
            <tr>
                <th class="col-sm-2">Nilai</th>
                <td>:&nbsp;
                    <input type="number" value="" name="nilai" required>
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
