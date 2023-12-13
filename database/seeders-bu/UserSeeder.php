<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {

        \DB::select('call buatAkun(?,?,?,?,?)', array("mahasiswa@gmail.com", bcrypt('mahasiswa'), "mahasiswa", "211402101", "Mahasiswa1"));
        \DB::select('call buatAkun(?,?,?,?,?)', array("mahasiswa2@gmail.com", bcrypt('mahasiswa2'), "mahasiswa", "211402102", "Mahasiswa2"));
        \DB::select('call buatAkun(?,?,?,?,?)', array("mahasiswa3@gmail.com", bcrypt('mahasiswa3'), "mahasiswa", "211402103", "Mahasiswa3"));

        \DB::select('call buatAkun(?,?,?,?,?)', array("dosen@gmail.com", bcrypt('dosen'), "dosen", "0107078401", "Dosen1"));
        \DB::select('call buatAkun(?,?,?,?,?)', array("dosen2@gmail.com", bcrypt('dosen2'), "dosen", "0107078402", "Dosen2"));
        \DB::select('call buatAkun(?,?,?,?,?)', array("dosen3@gmail.com", bcrypt('dosen3'), "dosen", "0107078403", "Dosen3"));

        \DB::select('call buatAkun(?,?,?,?,?)', array("staff@gmail.com", bcrypt('staff'), "staff", "0107078403", "Staff"));

    }
}


