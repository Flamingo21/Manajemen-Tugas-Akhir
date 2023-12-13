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
use App\Models\Sempro;
use App\Models\Semhas;
use App\Models\Sidang;
use App\Models\Viewakunmhs;
use App\Models\Viewmhsdospem;
use App\Models\Viewsemprodsn;
use App\Models\Viewsemprojadwal;
use App\Models\Viewsemhasjadwal;
use App\Models\Viewsidangjadwal;

use PDF;

class BerkasController extends Controller
{
    public function cetak_bimbing(){
        $id = Auth()->user()->id;
        $mahas = Viewakunmhs::SELECT('*')->WHERE('id', '=', $id)->get()->toArray();
        $dosens = Dosen::all();
        $dospems = Viewmhsdospem::SELECT('*')->WHERE('id', '=', $id)->get();
        return view('pdf.history_pdf',compact('id','mahas','dosens','dospems')); 
    }

    public function cetak_jadwalsempro($id)
    {
        $no = 1;
        $sempros = Sempro::SELECT('*')
        ->WHERE('id', '=', $id)
        ->get();
        $item = Viewsemprojadwal::SELECT('*')
        ->WHERE('id_sempro', '=', $id)
        ->get();
        $dospem = Viewmhsdospem::SELECT('*')->get();
        return view('berkas.pesertaSempro',compact('no','sempros','item','dospem'));
    }

    public function cetak_jadwalsemhas($id)
    {
        $no = 1;
        $sempros = Semhas::SELECT('*')
        ->WHERE('id', '=', $id)
        ->get();
        $item = Viewsemhasjadwal::SELECT('*')
        ->WHERE('id_semhas', '=', $id)
        ->get();
        $dospem = Viewmhsdospem::SELECT('*')->get();
        return view('berkas.pesertaSemhas',compact('no','sempros','item','dospem'));
    }

    public function cetak_jadwalsidang($id)
    {
        $no = 1;
        $sempros = Sidang::SELECT('*')
        ->WHERE('id', '=', $id)
        ->get();
        $item = Viewsidangjadwal::SELECT('*')
        ->WHERE('id_sidang','=', $id)
        ->get();
        $dospem = Viewmhsdospem::SELECT('*')->get();
        return view('berkas.pesertaSidang',compact('no','sempros','item','dospem'));
    }

    public function cetak_berkas()
    {
        return view('berkas.lembar_kendali_semprobu');
    }

}
