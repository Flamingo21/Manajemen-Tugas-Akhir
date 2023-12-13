<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Arr;
use App\Models\User;

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
use App\Models\DospemSempro;
use App\Models\DospemSemhas;
use App\Models\DospemSidang;
use App\Models\viewakundsn;
use App\Models\viewakunmhs;
use App\Models\viewmhsdospem;
use App\Models\viewsemprodsn;
use App\Models\viewsemhasdsn;
use App\Models\viewsidangdsn;
use App\Models\Viewsemprojadwal;
use App\Models\Viewsemhasjadwal;
use App\Models\Viewsidangjadwal;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $id = Auth()->user()->id;
        return view('staff.indexstaff',compact('id'));
    }

    public function tampilseminar()
    {
        return view('staff.daftarseminar');
    }

    public function tampilsempro()
    {
        $no = 1;
        $id = Auth()->user()->id;
        $sempros = Sempro::all();
        $seminars = Viewsemprodsn::SELECT('*')
        ->WHERE('status', '=', 'terima')
        ->WHERE('id_sempro', '=', $id)
        ->get();
        return view('staff.jadwalsempro',compact('no', 'id','sempros'));
    }

    public function tampilsempromhs($id)
    {
        $no = 1;
        $sempros = Sempro::all();
        $seminars = Prasempro::SELECT('*')
        ->WHERE('status', '=', 'terima')
        ->WHERE('id_sempro', '=', $id)
        ->get();
        return view('staff.daftarsempromhs',compact('no','sempros','seminars'));
    }

    public function enrollsempromhs($id)
    {
        $no = 1;
        $sempros = Sempro::all();
        $enrolls = Prasempro::SELECT('*')
        ->WHERE('status', '=', 'terima')
        ->WHERE('id_sempro', '=', NULL)
        ->get();
        return view('staff.daftarkansempromhs',compact('no','sempros','enrolls'));
    }

    public function enrollsemprofix($ids, $id)
    {
        $no = 1;
        \DB::select('call addSempro(?,?)', array($id, $ids));
        return redirect()->route('indexStaff');
    }

    public function buatsemprobaru()
    {
        $id = Auth()->user()->id;
        return view('staff.buatsempro',compact('id'));
    }

    public function buatsempro(Request $request)
    {
        $events = new Sempro;
        $events->tanggal = $request->get('tanggal');
        $events->jam = $request->get('jam');
        $events->tempat = $request->get('tempat');
        $events->save();
        return redirect()->route('indexStaff');
    }

    public function ubahsempro($id)
    {
        $sid = $id;
        $ids = Auth()->user()->id;
        $sempros = Sempro::SELECT('*')->WHERE('id', '=', $sid)->get();
        return view('staff.editsempro',compact('sid','sempros'));
    }

    public function editsemprofix(Request $request, $id)
    {
        Sempro::where('id', $id)
        ->update([
        'tanggal' => $request->get('tanggal'),
        'jam' => $request->get('jam'),
        'tempat' => $request->get('tempat')
        ]);
        return redirect()->route('indexStaff');
    }

    public function detailbandingsempro($id, $idp, $nim)
    {
        $no = 1;
        $sempros = Sempro::all();
        $seminars = Prasempro::SELECT('*')
        ->WHERE('id', '=', $idp)
        ->get();
        $mhs = Viewakunmhs::SELECT('*')
        ->WHERE('nim', '=', $nim)
        ->get();
        $dsn = Viewakundsn::SELECT('*')->get();
        $banding = Banding_sempro::SELECT('*')
        ->WHERE('id_prasempro', '=', $idp)
        ->get();
        return view('staff.semprodsnbanding',compact('no','sempros','seminars','mhs', 'dsn', 'banding'));
    }

    public function enrollbandingsempro($idp)
    {
        $no = 1;
        $seminars = Prasempro::SELECT('*')
        ->WHERE('id', '=', $idp)
        ->get();
        $dsn = Viewakundsn::SELECT('*')->get();
        return view('staff.enrolldsnsempro',compact('no','seminars','dsn'));
    }

    public function tambahdsnsempro(Request $request)
    {
        $banding = new Banding_sempro;
        $banding->id_prasempro = $request->get('id_prasempro');
        $banding->nidn = $request->get('nidn');
        $banding->save();
        return redirect()->route('indexStaff');
    }

    //****************************************************** */

    public function tampilsemhas()
    {
        $no = 1;
        $id = Auth()->user()->id;
        $semhass = Semhas::all();
        return view('staff.jadwalsemhas',compact('no', 'id','semhass'));
    }

    public function ubahsemhas($id)
    {
        $sid = $id;
        $ids = Auth()->user()->id;
        $semhas = Semhas::SELECT('*')->WHERE('id', '=', $sid)->get();
        return view('staff.editsemhas',compact('sid','semhas'));
    }

    public function editsemhasfix(Request $request, $id)
    {
        Semhas::where('id', $id)
        ->update([
        'tanggal' => $request->get('tanggal'),
        'jam' => $request->get('jam'),
        'tempat' => $request->get('tempat')
        ]);
        return redirect()->route('indexStaff');
    }

    public function buatsemhasbaru()
    {
        $id = Auth()->user()->id;
        return view('staff.buatsemhas',compact('id'));
    }

    public function buatsemhas(Request $request)
    {
        $events = new Semhas;
        $events->tanggal = $request->get('tanggal');
        $events->jam = $request->get('jam');
        $events->tempat = $request->get('tempat');
        $events->save();
        return redirect()->route('indexStaff');
    }

    public function tampilsemhasmhs($id)
    {
        $no = 1;
        $semhass = Semhas::all();
        $seminars = Prasemhas::SELECT('*')
        ->WHERE('status', '=', 'terima')
        ->WHERE('id_semhas', '=', $id)
        ->get();
        return view('staff.daftarsemhasmhs',compact('no','semhass','seminars'));
    }

    public function enrollsemhasmhs($id)
    {
        $no = 1;
        $semhass = semhas::all();
        $enrolls = Prasemhas::SELECT('*')
        ->WHERE('status', '=', 'terima')
        ->WHERE('id_semhas', '=', NULL)
        ->get();
        return view('staff.daftarkansemhasmhs',compact('no','semhass','enrolls'));
    }

    public function enrollsemhasfix($ids, $id)
    {
        $no = 1;
        \DB::select('call addSemhas(?,?)', array($id, $ids));
        return redirect()->route('indexStaff');
    }

    public function detailbandingsemhas($id, $idp, $nim)
    {
        $no = 1;
        $semhass = Semhas::all();
        $seminars = Prasemhas::SELECT('*')
        ->WHERE('id', '=', $idp)
        ->get();
        $mhs = Viewakunmhs::SELECT('*')
        ->WHERE('nim', '=', $nim)
        ->get();
        $dsn = Viewakundsn::SELECT('*')->get();
        $banding = Banding_semhas::SELECT('*')
        ->WHERE('id_prasemhas', '=', $idp)
        ->get();
        return view('staff.semhasdsnbanding',compact('no','semhass','seminars','mhs', 'dsn', 'banding'));
    }

    public function enrollbandingsemhas($idp)
    {
        $no = 1;
        $seminars = Prasemhas::SELECT('*')
        ->WHERE('id', '=', $idp)
        ->get();
        $dsn = Viewakundsn::SELECT('*')->get();
        return view('staff.enrolldsnsemhas',compact('no','seminars','dsn'));
    }

    public function tambahdsnsemhas(Request $request)
    {
        $banding = new Banding_semhas;
        $banding->id_prasemhas = $request->get('id_prasemhas');
        $banding->nidn = $request->get('nidn');
        $banding->save();
        return redirect()->route('indexStaff');
    }
    //****************************************************** */
    public function tampilsidang()
    {
        $no = 1;
        $id = Auth()->user()->id;
        $sidangss = Sidang::all();
        return view('staff.jadwalsidang',compact('no', 'id','sidangss'));
    }

    public function ubahsidang($id)
    {
        $sid = $id;
        $ids = Auth()->user()->id;
        $sidang = Sidang::SELECT('*')->WHERE('id', '=', $sid)->get();
        return view('staff.editsidang',compact('sid','sidang'));
    }

    public function editsidangfix(Request $request, $id)
    {
        Sidang::where('id', $id)
        ->update([
        'tanggal' => $request->get('tanggal'),
        'jam' => $request->get('jam'),
        'tempat' => $request->get('tempat')
        ]);
        return redirect()->route('indexStaff');
    }

    public function buatsidangbaru()
    {
        $id = Auth()->user()->id;
        return view('staff.buatsidang',compact('id'));
    }

    public function buatsidang(Request $request)
    {
        $events = new Sidang;
        $events->tanggal = $request->get('tanggal');
        $events->jam = $request->get('jam');
        $events->tempat = $request->get('tempat');
        $events->save();
        return redirect()->route('indexStaff');
    }

    public function tampilsidangmhs($id)
    {
        $no = 1;
        $sidangs = Sidang::all();
        $seminars = Prasidang::SELECT('*')
        ->WHERE('status', '=', 'terima')
        ->WHERE('id_sidang', '=', $id)
        ->get();
        return view('staff.daftarsidangmhs',compact('no','sidangs','seminars'));
    }

    public function enrollsidangmhs($id)
    {
        $no = 1;
        $sidangs = Sidang::all();
        $enrolls = Prasidang::SELECT('*')
        ->WHERE('status', '=', 'terima')
        ->WHERE('id_sidang', '=', NULL)
        ->get();
        return view('staff.daftarkansidangmhs',compact('no','sidangs','enrolls'));
    }

    public function enrollsidangfix($ids, $id)
    {
        $no = 1;
        \DB::select('call addSidang(?,?)', array($id, $ids));
        return redirect()->route('indexStaff');
    }

    public function detailbandingsidang($id, $idp, $nim)
    {
        $no = 1;
        $sidangs = Sidang::all();
        $seminars = Prasidang::SELECT('*')
        ->WHERE('id', '=', $idp)
        ->get();
        $mhs = Viewakunmhs::SELECT('*')
        ->WHERE('nim', '=', $nim)
        ->get();
        $dsn = Viewakundsn::SELECT('*')->get();
        $banding = Banding_sidang::SELECT('*')
        ->WHERE('id_prasidang', '=', $idp)
        ->get();
        return view('staff.sidangdsnbanding',compact('no','sidangs','seminars','mhs', 'dsn', 'banding'));
    }

    public function enrollbandingsidang($idp)
    {
        $no = 1;
        $seminars = Prasidang::SELECT('*')
        ->WHERE('id', '=', $idp)
        ->get();
        $dsn = Viewakundsn::SELECT('*')->get();
        return view('staff.enrolldsnsidang',compact('no','seminars','dsn'));
    }

    public function tambahdsnsidang(Request $request)
    {
        $banding = new Banding_sidang;
        $banding->id_prasidang = $request->get('id_prasidang');
        $banding->nidn = $request->get('nidn');
        $banding->save();
        return redirect()->route('indexStaff');
    }


    public function indexdospem()
    {
        $no = 1;
        $mahas = Mahasiswa::all();
        return view('staff.indexdospem',compact('no','mahas'));
    }

    public function detaildospem($nim)
    {
        $no = 1;
        $nims = $nim;
        $namas = Mahasiswa::SELECT('*')->WHERE('nim', '=', $nims)->get();
        $dosens = Dosen::all();
        $dospems = Viewmhsdospem::SELECT('*')->WHERE('nim', '=', $nims)->get();
        return view('staff.detaildospem',compact('no','dosens', 'nims','namas', 'dospems'));
    }

    public function detaildospemupdate(Request $request, $nim)
    {
        DB::table('dospems')
        -> where ('nim', $request->get('nim'))
        -> where ('statusdp', '=', 'dp1')
        ->update([
        'nidn' => $request->get('nidn1'),
        'accdp' => $request->get('accdp1'),
        ]);
        DB::table('dospems')
        -> where ('nim', $request->get('nim'))
        -> where ('statusdp', '=', 'dp2')
        ->update([
        'nidn' => $request->get('nidn2'),
        'accdp' => $request->get('accdp2'),
        ]);
        return redirect()->route('indexStaff');
    }

    public function tampilmhsbaru()
    {
        $no = 1;
        $id = Auth()->user()->id;
        $mahasiswa = Viewakunmhs::SELECT('*')
        ->WHERE('status', '<=', 2)
        ->get();
        return view('staff.mhsbaru',compact('no', 'id','mahasiswa'));
    }

    public function tampilmhssempro()
    {
        $no = 1;
        $id = Auth()->user()->id;
        $mahasiswa = Viewakunmhs::SELECT('*')
        ->WHERE('status', '>', 2)
        ->WHERE('status', '<=', 6)
        ->get();
        return view('staff.mhssempro',compact('no', 'id','mahasiswa'));
    }

    public function tampilmhssemhas()
    {
        $no = 1;
        $id = Auth()->user()->id;
        $mahasiswa = Viewakunmhs::SELECT('*')
        ->WHERE('status', '>', 6)
        ->WHERE('status', '<=', 10)
        ->get();
        return view('staff.mhssemhas',compact('no', 'id','mahasiswa'));
    }

    public function tampilmhssidang()
    {
        $no = 1;
        $id = Auth()->user()->id;
        $mahasiswa = Viewakunmhs::SELECT('*')
        ->WHERE('status', '>', 10)
        ->WHERE('status', '<=', 14)
        ->get();
        return view('staff.mhssidang',compact('no', 'id','mahasiswa'));
    }

    public function tampilmhspasca()
    {
        $no = 1;
        $id = Auth()->user()->id;
        $mahasiswa = Viewakunmhs::SELECT('*')
        ->WHERE('status', '=', 15)
        ->get();
        return view('staff.mhspasca',compact('no', 'id','mahasiswa'));
    }




}



