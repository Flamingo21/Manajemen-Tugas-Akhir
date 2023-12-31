<!DOCTYPE html>
<html>

<head>
    <title>Contoh SIDANG MEJA HIJAU - Daftar Peserta</title>
    <style type="text/css">
        body {
            width: 230mm;
            height: 100%;
            margin: 0 auto;
            padding: 0;
            font-size: 12pt;
            background: rgb(204, 204, 204);
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .main-page {
            width: 297mm;
            min-height: 210mm;
            margin: 10mm auto;
            background: white;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }

        .sub-page {
            padding: 1cm;
            height: 210mm;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 297mm;
                height: 210mm;
            }

            .main-page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }

        table {
            border-style: solid;
            border-width: 3px;
            border-color: white;

        }

        table tr .text2 {
            text-align: right;
            font-size: 13px;
        }

        table tr .text {
            text-align: center;
            font-size: 13px;
        }

        table tr .text3 {
            text-align: left;
            font-size: 13px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 5px;
        }

        table tr .text4 {
            text-align: center;
            font-size: 13px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        table tr .text5 {
            text-align: left;
            font-size: 13px;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        table tr .text9 {
            text-align: left;
            font-size: 13px;
            padding-right: 15px;
        }

        table tr td {
            font-size: 13px;
        }

        .skrt {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .pads {
            padding-bottom: 741px;
        }

        .padss {
            padding-bottom: 704px;
        }

        .padsss {
            padding-bottom: 593px;
        }

        .center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="main-page">
        <div class="sub-page">
            <div>
                <center>
                    <table width="700">
                        <tr>
                            <td class="text"><b><u>DAFTAR PENYAJI SIDANG MAHASISWA</u></b></td>
                        </tr>
                    </table>
                    <table width="700" class="text-right">
                    @foreach ($sempros as $s)
                        <tr>
                            <td width="275"></td>
                            <td style="padding-right: 25px;">TANGGAL</td>
                            <td width="445">: {{ $s ->tanggal }}
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>PUKUL</td>
                            <td width="445">: {{ $s ->jam }}
                                WIB</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>TEMPAT</td>
                            <td width="445">: {{ $s ->tempat }}</td>
                        </tr>
                    @endforeach
                    </table><br>
                    <table width="1000" border="1" class="skrt">
                        <tr>
                            <td width="20" class="text4">
                                <font size="2"><b>NO</b></font>
                            </td>
                            <td width="50" class="text4">
                                <font size="2"><b>NAMA / NIM</b></font>
                            </td>
                            <td width="250" class="text4">
                                <font size="2"><b>JUDUL SKRIPSI</b></font>
                            </td>
                            <td width="100" class="text4">
                                <font size="2"><b>PEMBIMBING I/II</b></font>
                            </td>
                            <td width="100" class="text4">
                                <font size="2"><b>PEMBANDING / PENGUJI</b></font>
                            </td>
                            <td width="30" class="text4">
                                <font size="2"><b>MODERATOR / NOTULEN</b></font>
                            </td>
                        </tr>
                            @foreach ($item as $s)
                            <tr>
                                <td width="20" class="text5">
                                    <font size="2">{{ $no++ }}</font>
                                </td>
                                <td width="50" class="text5">
                                    <font size="2">{{ $s->nama }}/{{ $s->nim }}</font>
                                </td>
                                <td width="200" class="text5">
                                    <font size="2">
                                        {{ $s->judul }}
                                    </font>
                                </td>
                                <td width="100" class="text6">
                                    <font size="2">
                                        <ol>
                                            <li>
                                            @foreach($dospem as $d)
                                            @if ($d->nim == $s->nim)
                                               @if($d->statusdp=="dp1")  
                                                {{ $d->namadsn }}
                                                @endif
                                            @endif
                                            @endforeach   
                                            </li>
                                            <li>
                                               @foreach($dospem as $d)
                                            	@if ($d->nim == $s->nim)
                                               @if($d->statusdp=="dp2")  
                                                {{ $d->namadsn }}
                                                @endif
                                            @endif
                                            @endforeach         
                                            </li>
                                        </ol>
                                    </font>
                                </td>
                                <td width="100" class="text6">
                                    <font size="2">
                                        <ol>
                                            <li>
                                            @foreach($dospem as $d)
                                            @if ($d->nim == $s->nim)
                                               @if($d->statusdp=="dp1")  
                                                {{ $d->namadsn }}
                                                @endif
                                            @endif
                                            @endforeach   
                                            </li>
                                            <li>
                                               @foreach($dospem as $d)
                                            @if ($d->nim == $s->nim)
                                               @if($d->statusdp=="dp2")  
                                                {{ $d->namadsn }}
                                                @endif
                                            @endif
                                            @endforeach         
                                            </li>
                                        </ol>
                                    </font>
                                </td>

                                <td width="30" class="text5">
                                    <font size="2">
                                        
                                    </font>
                                </td>
                            </tr>
                            @endforeach

                    </table>
                </center>
            </div>
        </div>
    </div>
</body>
</html>
