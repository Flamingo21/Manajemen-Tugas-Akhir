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
use App\Models\Viewsidangjadwal;


class PraSidangController extends Controller
{
    public function tampilindexsidang()
    {
        return view('mahasiswa.sidang.indexsidang');
    }

    public function progressidang()
    {
        $id = Auth()->user()->id;
        $mahas = Viewakunmhs::SELECT('nim')->WHERE('id', '=', $id)->get()->toArray();
        $sidang = Prasidang::SELECT('*')->WHERE('nim', '=', $mahas)->get();
        return view('mahasiswa.sidang.progressSidang',compact('id','mahas','sidang'));
    }


    public function jadwalsidang($id)
    {
        $sid = $id;
        $ids = Auth()->user()->id;
        $sidang = Viewsidangjadwal::SELECT('*')->WHERE('id_sidang', '=', $ids)->get();
        //dd($sempros);
        if (Viewsidangjadwal::SELECT('*')->WHERE('id_sidang', '=', $ids)->exists()){
            return view('mahasiswa.sidang.jadwalsidang',compact('sid','ids','sidang'));
        } else{
            return view('mahasiswa.sidang.jadwalsidangnull');
        }
        
    }

    public function berkassidang($id)
    {
        $sid = $id;
        $ids = Auth()->user()->id;
        $mahas = Viewakunmhs::SELECT('*')->WHERE('id', '=', $ids)->get()->toArray();
        $sidang = Prasidang::all();
        return view('mahasiswa.sidang.berkassidang',compact('sid','ids','mahas','sidang'));
    }

    public function uploadberkasfix(Request $request, $id)
    {
        $request->validate([
            'berkas_sidang' => 'required|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp'
        ]);

        $file = $request->file('berkas_sidang');
        if($file){
            $judul = $request->get('judul');
            $extension = $file->getClientOriginalExtension();
            $nama_file = 'file_' . date('YmdHis') . '.' . $extension;
            $file->move('berkas_sidangs',$nama_file);
            $berkas = 'berkas_sidangs/'.$nama_file;

        }
        Prasidang::where('id', $id)
            ->update([
            'berkas_sidang' => $berkas
            ]);
            return redirect()->route('indexMhs');
        
    }

}
