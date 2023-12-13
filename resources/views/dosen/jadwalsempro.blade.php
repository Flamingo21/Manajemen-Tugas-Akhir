@extends('layouts.sidebarDosen')
@section('title', 'Jadwal Sempro')
@section('content')

            <div class="container mt-5">
                <h2 class="fs-1">Jadwal Seminar Proposal</h2>
            </div>

            <!-- Sale & Revenue Start -->
            <div class="container bg-light shadow mt-5 py-5 px-5">
                <table class="table table-sm table-borderless fs-5">

                    <tbody>
                      <tr>
                        <th class="col-sm-2">Nama</th>
                        <td >:&nbsp;&nbsp;
                          @foreach ($sempros as $sems)
                            @if ($sems->id==$sid)
                            {{$sems['nama']}}
                            @endif
                          @endforeach
                        </td>

                      </tr>

                      <tr>
                        <th class="col-sm-2">NIM</th>
                        <td >:&nbsp;&nbsp;
                          @foreach ($sempros as $sems)
                            @if ($sems->id==$sid)
                            {{$sems['nim']}}
                            @endif
                          @endforeach
                        </td>

                      </tr>
                      <tr>
                        <th class="col-sm-2">Tanggal</th>
                        <td >:&nbsp;
                          @foreach ($sempros as $sems)
                          @if ($sems->id==$sid)
                          {{$sems['tanggal']}}
                          @endif
                          @endforeach
                        </td>

                      </tr>
                      <tr>
                        <th class="col-sm-2">Tempat</th>
                        <td >:&nbsp;
                          @foreach ($sempros as $sems)
                          @if ($sems->id==$sid)
                          {{$sems['tempat']}}
                          @endif
                          @endforeach
                        </td>

                      </tr>
                      <tr>
                        <th class="col-sm-2">Jam</th>
                        <td >:&nbsp;
                          @foreach ($sempros as $sems)
                          @if ($sems->id==$sid)
                          {{$sems['jam']}}
                          @endif
                          @endforeach
                        </td>

                      </tr>


                    </tbody>
                  </table>

            </div>
            @endsection
