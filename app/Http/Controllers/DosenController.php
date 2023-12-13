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
use App\Models\Viewdsnbandingsempro;
use App\Models\Viewdsnbandingsemhas;
use App\Models\Viewdsnbandingsidang;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $id = Auth()->user()->id;
        $dosen = viewakundsn::SELECT('*')->WHERE('id', '=', $id)->get()->toArray();
        return view('dosen.indexdsn',compact('id','dosen'));
    }

    //*************************************************************** */

    public function bimbingan()
    {
        $no=1;
        $id = Auth()->user()->id;
        $dosen = Viewakundsn::SELECT('nidn')->WHERE('id', '=', $id)->get()->toArray();
        $dospems = Viewmhsdospem::SELECT('*')->WHERE('nidn', '=', $dosen)->get();
        return view('dosen.catatanbimbingan',compact('no','dospems','dosen'));
    }

    /*
    public function daftarDospem()
    {
        $id = Auth()->user()->id;
        $dospem = viewakundsn::SELECT('*')->WHERE('id', '=', $id)->get()->toArray();;
        return view('dosen.daftarDospem',compact('id','dosen'));
    }
    */

    public function catatanbimbingan($nim)
    {
        $no=1;
        $nims = $nim;
        $id = Auth()->user()->id;
        $dosen = Viewakundsn::SELECT('*')->WHERE('id', '=', $id)->get();
        $dsn = $dosen[0]['nidn'];
        $bims = Bimbingan::all();
        return view('dosen.catatanbimbinganmhs',compact('no','id','dosen', 'nims', 'bims', 'dsn'));
    }

    public function catatanbimbinganbaru($nim, $nidn)
    {
        $no=1;
        $nims = $nim;
        $mhs = Viewakunmhs::SELECT('*')->WHERE('nim', '=', $nims)->get();
        $nidns = $nidn;
        $dsn = Viewakundsn::SELECT('*')->WHERE('nidn', '=', $nidns)->get();
        return view('dosen.tambahbimbingan',compact('no','nims','nidns', 'mhs', 'dsn'));
    }

    public function catatanbimbinganfix(Request $request)
    {
        $bims = new bimbingan;
        $bims->nim = $request->get('nim');
        $bims->nidn = $request->get('nidn');
        $bims->catatan = $request->get('catatan');
        $bims->save();
        return redirect()->route('indexDosen');
    }

    //*************************************************************** */

    public function dftrmhssempro()
    {
        $no=1;
        $id = Auth()->user()->id;
        $dosen = Viewakundsn::SELECT('nidn')->WHERE('id', '=', $id)->get()->toArray();
        $dospems = Viewsemprodsn::SELECT('*')->WHERE('nidn', '=', $dosen)->get();
        return view('dosen.daftarMahasiswaSempro',compact('no','dospems','dosen'));
    }

    public function mhssempro($nim, $id)
    {
        $no=1;
        $ids = Auth()->user()->id;
        $dosen = Viewakundsn::SELECT('*')->WHERE('id', '=', $ids)->get();
        $dsn = $dosen[0]['nidn'];
        $dospems = Viewsemprodsn::SELECT('*')
                    ->WHERE('nidn', '=', $dsn)
                    ->WHERE('id', '=', $id)
                    ->get();
            
        $dospem = Dospem::SELECT('*')
                ->WHERE('nidn', '=', $dsn)
                ->WHERE('nim', '=', $nim)
                ->get();
        $id_dsn = $dospem[0]['id'];

        $status = DospemSempro::SELECT('*')
                    ->where('id_sempro', '=', $id) 
                    ->where('id_dospem', '=', $id_dsn)
                    ->get();
        return view('dosen.detailsempromhs',compact('no','ids','dosen', 'dospems','status'));
    }

    public function jadwalsempromhs($nim, $id)
    {
        $sid = $id;
        $ids = Auth()->user()->id;
        $sempros = Viewsemprojadwal::SELECT('*')->WHERE('id_sempro', '=', $sid)->get();
        if (Viewsemprojadwal::SELECT('*')->WHERE('id_sempro', '=', $sid)->exists()){
            return view('dosen.jadwalsempro',compact('sid','ids','sempros'));
        } else{
            return view('dosen.jadwalsempronull');
        }
        
    }

    public function updateprasempro(request $request, $nim, $id)
    {
        $ids = Auth()->user()->id;
        $dosen = Viewakundsn::SELECT('*')->WHERE('id', '=', $ids)->get();
        $dsn = $dosen[0]['nidn'];

        $dospem = Dospem::SELECT('*')
                ->WHERE('nidn', '=', $dsn)
                ->WHERE('nim', '=', $nim)
                ->get();
        $id_dsn = $dospem[0]['id'];

        \DB::select('call accPrasempro(?,?)', array($id_dsn, $request->get('accdp')));

        return redirect()->route('indexDosen');
    }

    //*************************************************************** */

    public function dftrmhssemhas()
    {
        $no=1;
        $id = Auth()->user()->id;
        $dosen = Viewakundsn::SELECT('nidn')->WHERE('id', '=', $id)->get()->toArray();
        $dospems = Viewsemhasdsn::SELECT('*')->WHERE('nidn', '=', $dosen)->get();
        return view('dosen.daftarMahasiswaSemhas',compact('no','dospems','dosen'));
    }

    public function mhssemhas($nim, $id)
    {
        $no=1;
        $ids = Auth()->user()->id;
        $dosen = Viewakundsn::SELECT('*')->WHERE('id', '=', $ids)->get();
        $dsn = $dosen[0]['nidn'];
        $dospems = Viewsemhasdsn::SELECT('*')
                    ->WHERE('nidn', '=', $dsn)
                    ->WHERE('id', '=', $id)
                    ->get();
            
        $dospem = Dospem::SELECT('*')
                ->WHERE('nidn', '=', $dsn)
                ->WHERE('nim', '=', $nim)
                ->get();
        $id_dsn = $dospem[0]['id'];

        $status = DospemSemhas::SELECT('*')
                    ->where('id_semhas', '=', $id) 
                    ->where('id_dospem', '=', $id_dsn)
                    ->get();
        return view('dosen.detailsemhasmhs',compact('no','ids','dosen', 'dospems','status'));
    }

    public function jadwalsemhasmhs($nim, $id)
    {
        $sid = $id;
        $ids = Auth()->user()->id;
        $semhas = Viewsemhasjadwal::SELECT('*')->WHERE('id_semhas', '=', $sid)->get();
        if (Viewsemhasjadwal::SELECT('*')->WHERE('id_semhas', '=', $sid)->exists()){
            return view('dosen.jadwalsemhas',compact('sid','ids','semhas'));
        } else{
            return view('dosen.jadwalsemhasnull');
        }
        
    }

    public function updateprasemhas(request $request, $nim, $id)
    {
        $ids = Auth()->user()->id;
        $dosen = Viewakundsn::SELECT('*')->WHERE('id', '=', $ids)->get();
        $dsn = $dosen[0]['nidn'];

        $dospem = Dospem::SELECT('*')
                ->WHERE('nidn', '=', $dsn)
                ->WHERE('nim', '=', $nim)
                ->get();
        $id_dsn = $dospem[0]['id'];

        \DB::select('call accPrasemhas(?,?)', array($id_dsn, $request->get('accdp')));

        return redirect()->route('indexDosen');
    }

    //*************************************************************** */
    public function dftrmhssidang()
    {
        $no=1;
        $id = Auth()->user()->id;
        $dosen = Viewakundsn::SELECT('nidn')->WHERE('id', '=', $id)->get()->toArray();
        $dospems = Viewsidangdsn::SELECT('*')->WHERE('nidn', '=', $dosen)->get();
        return view('dosen.daftarMahasiswaSidang',compact('no','dospems','dosen'));
    }

    public function mhssidang($nim, $id)
    {
        $no=1;
        $ids = Auth()->user()->id;
        $dosen = Viewakundsn::SELECT('*')->WHERE('id', '=', $ids)->get();
        $dsn = $dosen[0]['nidn'];
        $dospems = Viewsidangdsn::SELECT('*')
                    ->WHERE('nidn', '=', $dsn)
                    ->WHERE('id', '=', $id)
                    ->get();
            
        $dospem = Dospem::SELECT('*')
                ->WHERE('nidn', '=', $dsn)
                ->WHERE('nim', '=', $nim)
                ->get();
        $id_dsn = $dospem[0]['id'];

        $status = DospemSidang::SELECT('*')
                    ->where('id_sidang', '=', $id) 
                    ->where('id_dospem', '=', $id_dsn)
                    ->get();
        return view('dosen.detailsidangmhs',compact('no','ids','dosen', 'dospems','status'));
    }

    public function jadwalsidangmhs($nim, $id)
    {
        $sid = $id;
        $ids = Auth()->user()->id;
        $sidangs = Viewsidangjadwal::SELECT('*')->WHERE('id_sidang', '=', $sid)->get();
        if (Viewsidangjadwal::SELECT('*')->WHERE('id_sidang', '=', $sid)->exists()){
            return view('dosen.jadwalsidang',compact('sid','ids','sidangs'));
        } else{
            return view('dosen.jadwalsidangnull');
        }
        
    }

    public function updateprasidang(request $request, $nim, $id)
    {
        $ids = Auth()->user()->id;
        $dosen = Viewakundsn::SELECT('*')->WHERE('id', '=', $ids)->get();
        $dsn = $dosen[0]['nidn'];

        $dospem = Dospem::SELECT('*')
                ->WHERE('nidn', '=', $dsn)
                ->WHERE('nim', '=', $nim)
                ->get();
        $id_dsn = $dospem[0]['id'];

        \DB::select('call accPrasidang(?,?)', array($id_dsn, $request->get('accdp')));

        return redirect()->route('indexDosen');
    }

    //*************************************************************** */
    public function dsnseminar()
    {
        $id = Auth()->user()->id;
        $dosen = viewakundsn::SELECT('*')->WHERE('id', '=', $id)->get()->toArray();
        return view('dosen.dsnseminar',compact('id','dosen'));
    }

    public function bandingsempro()
    {
        $no = 1;
        $id = Auth()->user()->id;
        $dosen = viewakundsn::SELECT('*')->WHERE('id', '=', $id)->get()->toArray();
        $dsn = $dosen[0]['nidn'];

        $seminar = Viewdsnbandingsempro::SELECT('*')
        ->WHERE('nidn', '=', $dsn)->get();

        return view('dosen.daftarBandingSempro',compact('no','id','dosen','seminar'));
    }

    public function nilaisempro($idp)
    {
        $no = 1;
        $id = Auth()->user()->id;
        $dosen = viewakundsn::SELECT('*')->WHERE('id', '=', $id)->get()->toArray();
        $dsn = $dosen[0]['nidn'];

        $banding = Viewdsnbandingsempro::SELECT('*')
        ->WHERE('nidn', '=', $dsn)
        ->WHERE('id_prasempro', '=', $idp)
        ->get();

        return view('dosen.buatnilaisempro',compact('no','id','dosen','banding'));
    }

    public function fixnilaisempro(Request $request)
    {
        $idp= $request->get('id_prasempro');
        $nidn= $request->get('nidn');
        $nilai= $request->get('nilai');

        DB::table('banding_sempros')
        ->WHERE('id_prasempro', '=', $idp)
        ->WHERE('nidn', '=', $nidn)
        ->update(['nilai' => $nilai]);
        return redirect()->route('indexDosen');
    }

    //*************************************************************** */
    public function bandingsemhas()
    {
        $no = 1;
        $id = Auth()->user()->id;
        $dosen = viewakundsn::SELECT('*')->WHERE('id', '=', $id)->get()->toArray();
        $dsn = $dosen[0]['nidn'];

        $seminar = Viewdsnbandingsemhas::SELECT('*')
        ->WHERE('nidn', '=', $dsn)->get();

        return view('dosen.daftarBandingSemhas',compact('no','id','dosen','seminar'));
    }

    public function nilaisemhas($idp)
    {
        $no = 1;
        $id = Auth()->user()->id;
        $dosen = viewakundsn::SELECT('*')->WHERE('id', '=', $id)->get()->toArray();
        $dsn = $dosen[0]['nidn'];

        $banding = Viewdsnbandingsemhas::SELECT('*')
        ->WHERE('nidn', '=', $dsn)
        ->WHERE('id_prasemhas', '=', $idp)
        ->get();

        return view('dosen.buatnilaisemhas',compact('no','id','dosen','banding'));
    }

    public function fixnilaisemhas(Request $request)
    {
        $idp= $request->get('id_prasemhas');
        $nidn= $request->get('nidn');
        $nilai= $request->get('nilai');

        DB::table('banding_semhas')
        ->WHERE('id_prasemhas', '=', $idp)
        ->WHERE('nidn', '=', $nidn)
        ->update(['nilai' => $nilai]);
        return redirect()->route('indexDosen');
    }

    //*************************************************************** */
        public function bandingsidang()
        {
            $no = 1;
            $id = Auth()->user()->id;
            $dosen = viewakundsn::SELECT('*')->WHERE('id', '=', $id)->get()->toArray();
            $dsn = $dosen[0]['nidn'];
    
            $seminar = Viewdsnbandingsidang::SELECT('*')
            ->WHERE('nidn', '=', $dsn)->get();
    
            return view('dosen.daftarBandingSidang',compact('no','id','dosen','seminar'));
        }
    
        public function nilaisidang($idp)
        {
            $no = 1;
            $id = Auth()->user()->id;
            $dosen = viewakundsn::SELECT('*')->WHERE('id', '=', $id)->get()->toArray();
            $dsn = $dosen[0]['nidn'];
    
            $banding = Viewdsnbandingsidang::SELECT('*')
            ->WHERE('nidn', '=', $dsn)
            ->WHERE('id_prasidang', '=', $idp)
            ->get();
    
            return view('dosen.buatnilaisidang',compact('no','id','dosen','banding'));
        }
    
        public function fixnilaisidang(Request $request)
        {
            $idp= $request->get('id_prasidang');
            $nidn= $request->get('nidn');
            $nilai= $request->get('nilai');
    
            DB::table('banding_sidangs')
            ->WHERE('id_prasidang', '=', $idp)
            ->WHERE('nidn', '=', $nidn)
            ->update(['nilai' => $nilai]);
            return redirect()->route('indexDosen');
        }
}
