<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrasemhasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::select('call uplBerkasSemhas(?,?)', array("1", "berkas"));
        
        \DB::select('call accPrasemhas(?,?)', array("1", "terima"));
        \DB::select('call accPrasemhas(?,?)', array("2", "terima"));

        \DB::select('call buatSemhas(?,?,?)', array("2022-12-31", "16:00:00", "Ruang Pertemuan 1"));
        \DB::select('call addSemhas(?,?)', array("1", "1"));
        \DB::select('call addnilaiSemhas(?,?,?)', array("1", "0107078401",80));
        \DB::select('call addnilaiSemhas(?,?,?)', array("1", "0107078402",90));
    }
}
