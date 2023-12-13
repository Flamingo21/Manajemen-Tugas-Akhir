<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {

        \DB::select('call buatAkun(?,?,?,?,?)', array("karinaangelatobing@gmail.com", bcrypt('mahasiswa'), "mahasiswa", "211402101", "Karina Angela"));
        \DB::select('call buatAkun(?,?,?,?,?)', array("mahasiswa2@gmail.com", bcrypt('mahasiswa'), "mahasiswa", "211402102", "Gabryelle Ninna"));
        \DB::select('call buatAkun(?,?,?,?,?)', array("mahasiswa3@gmail.com", bcrypt('mahasiswa'), "mahasiswa", "211402103", "Kezia Natalia"));
        \DB::select('call buatAkun(?,?,?,?,?)', array("mahasiswa1@gmail.com", bcrypt('mahasiswa'), "mahasiswa", "211402104", "Gery Jonathan"));
        \DB::select('call buatAkun(?,?,?,?,?)', array("mahasiswa4@gmail.com", bcrypt('mahasiswa'), "mahasiswa", "211402105", "Jessica Larasty"));
        \DB::select('call buatAkun(?,?,?,?,?)', array("mahasiswa5@gmail.com", bcrypt('mahasiswa'), "mahasiswa", "211402106", "Paulus Simon"));
        \DB::select('call buatAkun(?,?,?,?,?)', array("mahasiswa6@gmail.com", bcrypt('mahasiswa'), "mahasiswa", "211402107", "Bagus Sadewo"));
        \DB::select('call buatAkun(?,?,?,?,?)', array("mahasiswa7@gmail.com", bcrypt('mahasiswa'), "mahasiswa", "211402108", "Nicholas Manurung"));
        \DB::select('call buatAkun(?,?,?,?,?)', array("mahasiswa8@gmail.com", bcrypt('mahasiswa'), "mahasiswa", "211402109", "Abigail Purba"));
        \DB::select('call buatAkun(?,?,?,?,?)', array("mahasiswa9@gmail.com", bcrypt('mahasiswa'), "mahasiswa", "211402110", "Rafael Daniel"));

        \DB::select('call buatAkun(?,?,?,?,?)', array("dosen@gmail.com", bcrypt('dosen'), "dosen", "0107078401", "Indra Aulia, S.TI, M.Kom"));
        \DB::select('call buatAkun(?,?,?,?,?)', array("dosen2@gmail.com", bcrypt('dosen'), "dosen", "0107078402", "Umaya Ramadhani Putri Nasution S.TI., M.Kom."));
        \DB::select('call buatAkun(?,?,?,?,?)', array("dosen3@gmail.com", bcrypt('dosen'), "dosen", "0107078403", "Niskarto Zendrato, S.Kom., M.Kom"));
        \DB::select('call buatAkun(?,?,?,?,?)', array("dosen4@gmail.com", bcrypt('dosen'), "dosen", "0107078404", "Fahrurrozi Lubis, B.IT., M.Sc.IT"));
        \DB::select('call buatAkun(?,?,?,?,?)', array("dosen5@gmail.com", bcrypt('dosen'), "dosen", "0107078405", "Seniman, S.Kom., M.Kom."));
        \DB::select('call buatAkun(?,?,?,?,?)', array("dosen6@gmail.com", bcrypt('dosen'), "dosen", "0107078406", "Marischa Elveny, S.TI, M.Kom."));

        \DB::select('call buatAkun(?,?,?,?,?)', array("staff@gmail.com", bcrypt('staff'), "staff", "0107078403", "Staff"));

    }
}


