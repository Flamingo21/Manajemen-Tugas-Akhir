<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Auth;
use App\Models\User;

use App\Models\Bank;
use App\Models\Topup;
use App\Models\Tagihan;
use App\Models\Kegiatan;
use App\Models\Saldo;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Dospem;
use App\Models\Prasempro;
use App\Models\Prasemhas;
use App\Models\Prasidang;
use App\Models\Pascasidang;
use App\Models\Bimbingan;
use App\Models\Seminar;
use App\Models\Viewakunmhs;
use App\Models\Viewmhsdospem;
use App\Models\Viewsemprojadwal;

class PraSemproController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tampilindexsempro()
    {
        return view('mahasiswa.indexsempro');
    }

    public function calonbimbing()
    {
        $id = Auth()->user()->id;
        $mahas = Viewakunmhs::SELECT('*')->WHERE('id', '=', $id)->get()->toArray();
        $dosens = Dosen::all();
        $dospems = Viewmhsdospem::SELECT('*')->WHERE('id', '=', $id)->get();
        if (Viewmhsdospem::SELECT('*')->WHERE('id', '=', $id)->exists()){
            return view('mahasiswa.pembimbingfix',compact('id','mahas','dosens','dospems'));
        } else{
            return view('mahasiswa.calonbimbing',compact('id','mahas','dosens'));
        }
    }

    public function buatdospem(Request $request)
    {
        $dospems1 = new Dospem;
        $dospems1->nim = $request->get('nim');
        $dospems1->nidn = $request->get('nidn1');
        $dospems1->statusdp = $request->get('statusdp1');
        $dospems1->accdp = $request->get('accdp1');
        $dospems1->save();
        $dospems2 = new Dospem;
        $dospems2->nim = $request->get('nim');
        $dospems2->nidn = $request->get('nidn2');
        $dospems2->statusdp = $request->get('statusdp2');
        $dospems2->accdp = $request->get('accdp2');
        $dospems2->save();
        return redirect()->route('indexMhs');
    }

    public function progressempro()
    {
        $id = Auth()->user()->id;
        $mahas = Viewakunmhs::SELECT('nim')->WHERE('id', '=', $id)->get()->toArray();
        $sempros = Prasempro::SELECT('*')->WHERE('nim', '=', $mahas)->get();
        return view('mahasiswa.progressSempro',compact('id','mahas','sempros'));
    }

    public function buatjudulbaru()
    { 
        $id = Auth()->user()->id;
        $mahas = Viewakunmhs::SELECT('*')->WHERE('id', '=', $id)->get()->toArray();
        return view('mahasiswa.buatJudul',compact('id','mahas',));
    }

    public function buatjudul(Request $request)
    { 
        $request->validate([
            'berkas_uji' => 'required|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp'
        ]);

        $file = $request->file('berkas_uji');
        if($file){
            $judul = $request->get('judul');
            $extension = $file->getClientOriginalExtension();
            $nama_file = 'file_' . date('YmdHis') . '.' . $extension;
            $file->move('berkas_ujis',$nama_file);
            $berkas = 'berkas_ujis/'.$nama_file;

        }

        \DB::select('call buatPrasempro(?,?,?,?,?)', array($request->get('nim'), $request->get('bidang'), $request->get('judul'), $request->get('diajukan_oleh'), $berkas));
        return redirect()->route('indexMhs');

    }

    public function hasiluji($id)
    {
        $sid = $id;
        $ids = Auth()->user()->id;
        $mahas = Viewakunmhs::SELECT('*')->WHERE('id', '=', $ids)->get()->toArray();
        $sempros = Prasempro::all();
        return view('mahasiswa.hasiluji',compact('sid','ids','mahas','sempros'));
    }

    public function jadwalsempro($id)
    {
        $sid = $id;
        $ids = Auth()->user()->id;
        $sempros = Viewsemprojadwal::SELECT('*')->WHERE('id_sempro', '=', $sid)->get();
        if (Viewsemprojadwal::SELECT('*')->WHERE('id_sempro', '=', $sid)->exists()){
            return view('mahasiswa.jadwalsempro',compact('sid','ids','sempros'));
        } else{
            return view('mahasiswa.jadwalsempronull');
        }
        
    }

    public function berkassempro($id)
    {
        $sid = $id;
        $ids = Auth()->user()->id;
        $mahas = Viewakunmhs::SELECT('*')->WHERE('id', '=', $ids)->get()->toArray();
        $sempros = Prasempro::all();
        return view('mahasiswa.berkassempro',compact('sid','ids','mahas','sempros'));
    }

    public function uploadberkasfix(Request $request, $id)
    {
        $request->validate([
            'berkas_sempro' => 'required|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp'
        ]);

        $file = $request->file('berkas_sempro');
        if($file){
            $judul = $request->get('judul');
            $extension = $file->getClientOriginalExtension();
            $nama_file = 'file_' . date('YmdHis') . '.' . $extension;
            $file->move('berkas_sempros',$nama_file);
            $berkas = 'berkas_sempros/'.$nama_file;

        }
        Prasempro::where('id', $id)
            ->update([
            'judul' => $judul,
            'berkas_sempro' => $berkas
            ]);
            return redirect()->route('indexMhs');
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
