@extends('layouts.sidebar')
@section('title', 'Pembimbing Fixed')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Pembimbing</h2>
</div>

<!-- Sale & Revenue Start -->
<div class="container bg-light shadow mt-5 py-5 px-5">
    <table class="table table-sm table-borderless fs-5">

        <tbody>
            <tr>
                <th class="col-sm-2">Nama</th>
                <td>:&nbsp;
                    @foreach ($mahas as $maha => $m)
                        {{$m['nama']}}
                    @endforeach
                </td>

            </tr>

            <tr>
                <th class="col-sm-2">NIM</th>
                <td>:&nbsp;
                    @foreach ($mahas as $maha => $m)
                        {{$m['nim']}}
                    @endforeach
                </td>

            </tr>
            <tr>
                <th class="col-sm-2">Catatan Hasil Uji</th>
                <td>:&nbsp;
                    @foreach ($sempros as $sems)
                        @if ($sems->id==$sid)
                        {{$sems['catatan_uji']}}
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">Nilai</th>
                <td>:&nbsp;
                    @foreach ($sempros as $sems)
                        @if ($sems->id==$sid)
                        {{$sems['uji_kelayakan']}}
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">Status</th>
                <td>:&nbsp;
                    @foreach ($sempros as $sems)
                        @if ($sems->id==$sid)
                        {{$sems['uji_kelayakan']}}
                        @endif
                    @endforeach
                </td>

            </tr>

        </tbody>
    </table>

</div>
@endsection
