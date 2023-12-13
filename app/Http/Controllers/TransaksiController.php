<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Models\User;
use App\Models\Bank;
use App\Models\Topup;
use App\Models\Tagihan;
use App\Models\Kegiatan;
use App\Models\Saldo;

use PDF;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $tagih = Tagihan::all();
        $kegiatan = Kegiatan::all();
        $topup = Topup::all();
        $saldos = Saldo::all();
        return view('user.historitransaksi',compact('tagih','topup','kegiatan','saldos', 'no'));
    }
    
    public function cetak_pdf(){
        set_time_limit(300);	
        $no = 1;
        $tagih = Tagihan::all();
        $kegiatan = Kegiatan::all();
        $topup = Topup::all();
        $saldos = Saldo::all();
        $pdf = PDF::loadview('user.history_pdf',compact('tagih','topup','kegiatan','saldos', 'no')); 
        return $pdf->stream();
    }

    public function ikutevent(Request $request)
    {
        if($request->get('pin')==Auth()->user()->pin){
        $bayar = new Tagihan;
        $bayar->id_siswa = $request->get('id_siswa');
        $bayar->id_kegiatan = $request->get('id_kegiatan');
        $bayar->total_tagihan = $request->get('total_tagihan');
        $bayar->save();
        $users=Auth()->user()->id;
        DB::table('saldos')
        -> where ('id_siswa',$users)
        -> update(['saldo'=>
            (DB::table('topups')
            -> where ('id_siswa',$users)
            -> where ( 'status' ,'=', 'lunas' )
            -> SUM('nominal'))-
            (DB::table('tagihans')
            -> where ('id_siswa',$users)
            -> SUM('total_tagihan'))]);
            return redirect()->route('index');
        } else {
            return redirect()->back()->with('error', 'pin salah');
        }
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
