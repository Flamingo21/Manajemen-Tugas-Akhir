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
use app\Models\CsvData;
use App\Http\Requests\CsvImportRequest;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function tambahmhs()
    {
        return view('staff.tambahmhs');
    }

    public function parseImport(CsvImportRequest $request)
{
    $path = $request->file('csv_file')->getRealPath();
    $data = array_map('str_getcsv', file($path));
    $csv_data = array_slice($data, 0, 2);

    foreach ($csv_data as $row) {
        foreach ($row as $low) {
        $myArray = explode(';', $low);
        \DB::select('call buatAkun(?,?,?,?,?)', array($myArray[0], bcrypt($myArray[1]), $myArray[2], $myArray[3], $myArray[4]));
        }
    }

    return redirect()->back() ->with('alert', 'Updated!');
}
}
