@extends('layouts.sidebarDosen')
@section('title', 'Progress Sidang')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Progress Sidang</h2>
</div>

<!-- Sale & Revenue Start -->
<div class="container bg-light shadow mt-5 py-5 px-5">
    <table class="table table-sm table-borderless fs-5">

        <tbody>
            <tr>
                <th class="col-sm-2">Nama</th>
                <td>:&nbsp;
                    @foreach ($dospems as $maha => $m)
                        {{$m['nama']}}
                    @endforeach
                </td>

            </tr>

            <tr>
                <th class="col-sm-2">NIM</th>
                <td>:&nbsp;
                    @foreach ($dospems as $maha => $m)
                        {{$m['nim']}}
                    @endforeach
                </td>

            </tr>
            <tr>
                <th class="col-sm-2">Judul</th>
                <td>:&nbsp;
                    @foreach ($dospems as $maha => $m)
                        {{$m['judul']}}
                    @endforeach
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">Berkas</th>
                <td>:&nbsp;
                    @foreach ($dospems as $maha => $m)
                    @if (isset($m->berkas_sempro))
                    <a href="{{ asset($m->berkas_sempro) }}" class="btn btn-primary" download="">Download</a>
                    @else
                    Belum ada berkas
                    @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">Jadwal Seminar</th>
                <td>:&nbsp;
                    @foreach ($dospems as $maha => $m)
                    <a href="jadwalsidang/{{ $m->id }}" class="btn btn-primary">Jadwal</a>
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>

    <form class="form-horizontal" 
    @foreach ($dospems as $maha => $m)
    action="{{$m->id}}/updatestatussidang" 
    @endforeach
    method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <table class="table table-sm table-borderless fs-5">
                <tbody>
                    <tr>
                        <th class="col-sm-2">Status</th>
                        <td>:&nbsp;
                            <select name="accdp" id="accdp"
                                onChange="getSubCat(this.value);" required>
                                @foreach ($status as $maha => $m)
                                <option value="{{$m->accdp}}">{{$m->accdp}}</option>
                                @endforeach
                                <option value="pending">pending</option>
                                <option value="terima">terima</option>
                            </select>
                        </td>
    
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-end me-3">
                <button type="submit" class="col-sm-1 btn btn-primary "
                name="submit">
                Simpan
                </button>
            </div>
        </form>

</div>
@endsection
