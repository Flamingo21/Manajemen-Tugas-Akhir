<!DOCTYPE html>
<html>

<head>
    <title>REPORT DATA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>
    <center>
        <img alt="" src="{{ asset('images/image6.png') }}" style="width: 100px; height: 100px; margin-left: 0.00px; margin-top: 0.00px;">
        <img alt="" src="{{ asset('images/image3.png') }}" style="width: 597.00px; height: 178.00px; margin-left: 0.00px; margin-top: 0.00px;">
        <img alt="" src="{{ asset('images/image1.png') }}" style="width: 744.00px; height: 2.00px; margin-left: 0.00px; margin-top: 0.00px;">
        <h4>Form Calon Pembimbing</h4>
        <hr>
    </center>
    <div class="container-fluid" style="width: 75%">
    <div class="row">
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
    </div>
    <div class="row">
        <h5>Histori Tagihan</h5>
        <table class='table table-bordered' id="adminTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kegiatan</th>
                    <th>Nominal</th>
                    <th>Transaction Date</th>

                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    </div>
</body>

</html>
