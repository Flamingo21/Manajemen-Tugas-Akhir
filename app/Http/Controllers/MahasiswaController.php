<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;

use App\Models\Bank;
use App\Models\Topup;
use App\Models\Tagihan;
use App\Models\Kegiatan;
use App\Models\Saldo;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Dospem;
use App\Models\Sempro;
use App\Models\Semhas;
use App\Models\Sidang;
use App\Models\Prasempro;
use App\Models\Prasemhas;
use App\Models\Prasidang;
use App\Models\Pascasidang;
use App\Models\Bimbingan;
use App\Models\Banding_sempro;
use App\Models\Banding_semhas;
use App\Models\Banding_sidang;
use App\Models\Viewakunmhs;
use App\Models\Viewmhsdsnbim;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth()->user()->id;
        $mahas = Viewakunmhs::SELECT('*')->WHERE('id', '=', $id)->get()->toArray();;
        return view('mahasiswa.homeMhs',compact('id','mahas'));
    }

    public function bimbingan()
    {
        $id = Auth()->user()->id;
        $bims = Viewmhsdsnbim::SELECT('*')->WHERE('id', '=', $id)->get();
        return view('mahasiswa.bimbingan',compact('id','bims'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
