@extends('layouts.sidebar')
@section('title', 'Tentukan Judul')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Upload Berkas Seminar Proposal</h2>
</div>

<!-- Sale & Revenue Start -->
<form class="form-horizontal" action="uploadberkasfix" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="container bg-light shadow mt-5 py-5 px-5">
    <table class="table table-sm table-borderless fs-5">
        <tbody>
            <tr>
                <th class="col-sm-2">Nama</th>
                <td>:&nbsp;&nbsp;
                    @foreach ($mahas as $maha => $m)
                        {{$m['nama']}}
                    @endforeach
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">NIM</th>
                <td>:&nbsp;&nbsp;
                    @foreach ($mahas as $maha => $m)
                        {{$m['nim']}}
                        <input type="hidden" name="nim" value="{{$m['nim']}}" />
                    @endforeach
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">Judul</th>
                <td>:&nbsp;&nbsp;
                    @foreach ($sempros as $sems)
                    @if ($sems->id == $sid)
                    <input type="text" class="form-control" id="judul" name="judul"
                        placeholder="Enter title" required value="{!!$sems->judul!!}">
                    @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">Berkas Seminar Proposal</th>
                <td>:&nbsp;
                    @foreach ($sempros as $sems)
                    @if ($sems->id == $sid)
                    <input type="file" id="berkas_sempro" name="berkas_sempro"
                        placeholder="Enter title" required value="{!!$sems->berkas_sempro!!}">
                    @endif
                    @endforeach
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
