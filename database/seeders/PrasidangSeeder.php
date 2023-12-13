<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrasidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::select('call uplBerkasSidang(?,?)', array("1", "berkas"));
        \DB::select('call accPrasidang(?,?)', array("1", "terima"));
        \DB::select('call accPrasidang(?,?)', array("2", "terima"));

        \DB::select('call buatsidang(?,?,?)', array("2022-12-31", "16:00:00", "Ruang Pertemuan 1"));
        \DB::select('call addsidang(?,?)', array("1", "1"));
        \DB::select('call addnilaisidang(?,?,?)', array("1", "0107078401",80));
        \DB::select('call addnilaisidang(?,?,?)', array("1", "0107078402",90));
    }
}
