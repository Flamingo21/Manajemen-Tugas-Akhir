@extends('layouts.sidebarStaff')
@section('title', 'Edit Seminar')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Detail Dospem</h2>
</div>

<!-- Sale & Revenue Start -->
<form class="form-horizontal" action="detailupdate" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="container bg-light shadow mt-5 py-5 px-5">
        <table class="table table-sm table-borderless fs-5">
            <tbody>
                <tr>
                    <th class="col-sm-2">Nama Mahasiswa</th>
                    <td>:&nbsp;
                        @foreach ($namas as $nama)
                        {{ $nama->nama }}
                        <input type="hidden" value="{{ $nama->nim }}" name="nim">
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th class="col-sm-2">Dosen 1</th>
                    <td>:&nbsp;
                        @foreach ($dospems as $do)
                        @if ($do->statusdp=="dp1")
                            @if ($do->accdp=="terima")
                                {{$do->namadsn}}
                            @else
                            <select name="nidn1" id="nidn1"
                                onChange="getSubCat(this.value);" required>
                                <option value="{{$do->nidn}}">{{$do->namadsn}}</option> 
                                @foreach ($dosens as $d)
                                <option value="{{$d->nidn}}">{{$d->nama}}</option>
                                @endforeach
                            </select>
                            @endif
                        @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th class="col-sm-2">Verif Dosen 1</th>
                    <td>:&nbsp;
                            @foreach ($dospems as $do)
                            @if ($do->statusdp=="dp1")
                            @if ($do->accdp=="terima")
                                Terverifikasi
                            @else
                            <select name="accdp1" id="accdp1"
                            onChange="getSubCat(this.value);" required>
                            <option value="pending">Pending</option>
                            <option value="terima">Terima</option>
                            </select>
                            @endif
                            @endif 
                            @endforeach
                    </td>
                </tr>
                <tr>
                    <th class="col-sm-2">Dosen 2</th>
                    <td>:&nbsp;
                        @foreach ($dospems as $do)
                        @if ($do->statusdp=="dp2")
                            @if ($do->accdp=="terima")
                                {{$do->namadsn}}
                            @else
                            <select name="nidn2" id="nidn2"
                                onChange="getSubCat(this.value);" required>
                                <option value="{{$do->nidn}}">{{$do->namadsn}}</option> 
                                @foreach ($dosens as $d)
                                <option value="{{$d->nidn}}">{{$d->nama}}</option>
                                @endforeach
                            </select>
                            @endif
                        @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th class="col-sm-2">Verif Dosen 2</th>
                    <td>:&nbsp;
                            @foreach ($dospems as $do)
                            @if ($do->statusdp=="dp2")
                            @if ($do->accdp=="terima")
                                Terverifikasi
                            @else
                            <select name="accdp2" id="accdp2"
                            onChange="getSubCat(this.value);" required>
                            <option value="pending">Pending</option>
                            <option value="terima">Terima</option>
                            </select>
                            @endif
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
    