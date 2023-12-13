@extends('layouts.sidebar')
@section('title', 'Pembimbing')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Pembimbing</h2>
</div>

<!-- Sale & Revenue Start -->
<form class="form-horizontal" action="buatdospem" method="post">
    @csrf
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
                    <th class="col-sm-2">Dosen 1</th>
                    <td>:&nbsp;
                        <select name="nidn1" id="nidn1"
                            onChange="getSubCat(this.value);" required>
                            <option value="">Pilih Dosen Pembimbing 1 </option>
                            @foreach ($dosens as $d)
                            <option value="{{$d->nidn}}">{{$d->nama}}</option>
                            @endforeach
                        </select>
                    </td>

                </tr>
                <tr>
                    <th class="col-sm-2">Dosen 2</th>
                    <td>:&nbsp;
                        <select name="nidn2" id="nidn2"
                            onChange="getSubCat(this.value);" required>
                            <option value="">Pilih Dosen Pembimbing 2 </option>
                            @foreach ($dosens as $d)
                            <option value="{{$d->nidn}}">{{$d->nama}}</option>
                            @endforeach
                        </select>
                    </td>

                </tr>
                <input type="hidden" name="statusdp1" value="dp1" />
                <input type="hidden" name="statusdp2" value="dp2" />
                <input type="hidden" name="accdp1" value="pending" />
                <input type="hidden" name="accdp2" value="pending" />

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
