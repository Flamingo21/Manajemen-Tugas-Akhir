<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Auth;
use App\Models\User;

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
use App\Models\Viewsemhasjadwal;

class PraSemhasController extends Controller
{
    public function tampilindexsemhas()
    {
        return view('mahasiswa.semhas.indexsemhas');
    }

    public function progressemhas()
    {
        $id = Auth()->user()->id;
        $mahas = Viewakunmhs::SELECT('nim')->WHERE('id', '=', $id)->get()->toArray();
        $semhas = Prasemhas::SELECT('*')->WHERE('nim', '=', $mahas)->get();
        return view('mahasiswa.semhas.progressSemhas',compact('id','mahas','semhas'));
    }


    public function jadwalsemhas($id)
    {
        $sid = $id;
        $ids = Auth()->user()->id;
        $semhass = Viewsemhasjadwal::SELECT('*')->WHERE('id_semhas', '=', $ids)->get();
        //dd($sempros);
        if (Viewsemhasjadwal::SELECT('*')->WHERE('id_semhas', '=', $ids)->exists()){
            return view('mahasiswa.semhas.jadwalsemhas',compact('sid','ids','semhass'));
        } else{
            return view('mahasiswa.semhas.jadwalsemhasnull');
        }
        
    }

    public function berkassemhas($id)
    {
        $sid = $id;
        $ids = Auth()->user()->id;
        $mahas = Viewakunmhs::SELECT('*')->WHERE('id', '=', $ids)->get()->toArray();
        $semhass = Prasemhas::all();
        return view('mahasiswa.semhas.berkassemhas',compact('sid','ids','mahas','semhass'));
    }

    public function uploadberkasfix(Request $request, $id)
    {
        $request->validate([
            'berkas_semhas' => 'required|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp'
        ]);

        $file = $request->file('berkas_semhas');
        if($file){
            $judul = $request->get('judul');
            $extension = $file->getClientOriginalExtension();
            $nama_file = 'file_' . date('YmdHis') . '.' . $extension;
            $file->move('berkas_semhass',$nama_file);
            $berkas = 'berkas_semhass/'.$nama_file;

        }
        Prasemhas::where('id', $id)
            ->update([
            'berkas_semhas' => $berkas
            ]);
            return redirect()->route('indexMhs');
        
    }

}

