<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DospemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::select('call buatDospems(?,?,?)', array("211402101", "0107078401", "dp1"));
        \DB::select('call buatDospems(?,?,?)', array("211402101", "0107078402", "dp2"));
        \DB::select('call accDospems(?,?,?)', array("211402101", "0107078401", "terima"));
        \DB::select('call buatDospems(?,?,?)', array("211402102", "0107078402", "dp1"));
        \DB::select('call buatDospems(?,?,?)', array("211402102", "0107078403", "dp2"));
        \DB::select('call accDospems(?,?,?)', array("211402102", "0107078403", "terima"));
        \DB::select('call buatDospems(?,?,?)', array("211402103", "0107078401", "dp1"));
        \DB::select('call buatDospems(?,?,?)', array("211402103", "0107078403", "dp2"));
        \DB::select('call accDospems(?,?,?)', array("211402103", "0107078401", "terima"));
        \DB::select('call accDospems(?,?,?)', array("211402103", "0107078403", "terima"));
    }
}
