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
                <th class="col-sm-2">Dosen 1</th>
                <td>:&nbsp;
                    @foreach ($dospems as $d)
                        @if ($d->statusdp=="dp1")
                        @if ($d->accdp=="terima")
                        {{$d['namadsn']}} 
                        @else
                        Sedang Diverifikasi
                        @endif
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">Dosen 2</th>
                <td>:&nbsp;
                    @foreach ($dospems as $d)
                        @if ($d->statusdp=="dp2")
                        @if ($d->accdp=="terima")
                        {{$d['namadsn']}}
                            
                        @else
                            Sedang Diverifikasi
                        @endif
                        @endif
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
    <div class="row">
        <a href="cetak_pembimbing" class='btn btn-primary col-sm-2' target="_blank">Download Berkas</a>
    </div>

</div>
@endsection
