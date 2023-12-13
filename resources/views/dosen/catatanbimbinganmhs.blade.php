@extends('layouts.sidebarDosen')
@section('title', 'Catatan Bimbingan')
@section('content')

<div class="container mt-5">
    <h2 class="fs-1">Catatan Bimbingan Mahasiswa</h2>
</div>

<!-- Sale & Revenue Start -->
<div class="container bg-light shadow mt-5 py-5 px-5">
    <div class="d-flex justify-content-end me-3 mb-4">
                <a href="{{ $nims }}/{{ $dsn }}/baru" class="btn btn-primary">Buat Catatan</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="col-sm-1">No.</th>
                <th scope="col" class="col-sm-2">Tanggal</th>
                <th scope="col" class="col-sm-5">Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bims as $s)
            @if ($s->nim==$nims)
                @if ($s->nidn==$dsn)
                <tr>
                    <td class="col-sm-1">{{ $no++ }}</td>
                    <th class="col-sm-2">{{ $s->created_at }}</th>
                    <td class="col-sm-5">{{ $s->catatan }}</td>
                </tr>  
                @endif
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
