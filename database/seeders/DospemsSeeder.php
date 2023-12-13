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
        \DB::select('call buatDospems(?,?,?)', array("211402102", "0107078402", "dp1"));
        \DB::select('call buatDospems(?,?,?)', array("211402102", "0107078403", "dp2"));
        \DB::select('call buatDospems(?,?,?)', array("211402103", "0107078401", "dp1"));
        \DB::select('call buatDospems(?,?,?)', array("211402103", "0107078404", "dp2"));
        \DB::select('call buatDospems(?,?,?)', array("211402104", "0107078405", "dp1"));
        \DB::select('call buatDospems(?,?,?)', array("211402104", "0107078406", "dp2"));
        \DB::select('call buatDospems(?,?,?)', array("211402105", "0107078401", "dp1"));
        \DB::select('call buatDospems(?,?,?)', array("211402105", "0107078402", "dp2"));
        \DB::select('call buatDospems(?,?,?)', array("211402106", "0107078403", "dp1"));
        \DB::select('call buatDospems(?,?,?)', array("211402106", "0107078406", "dp2"));
        \DB::select('call buatDospems(?,?,?)', array("211402107", "0107078405", "dp1"));
        \DB::select('call buatDospems(?,?,?)', array("211402107", "0107078404", "dp2"));
        \DB::select('call buatDospems(?,?,?)', array("211402108", "0107078406", "dp1"));
        \DB::select('call buatDospems(?,?,?)', array("211402108", "0107078403", "dp2"));
        \DB::select('call buatDospems(?,?,?)', array("211402109", "0107078401", "dp1"));
        \DB::select('call buatDospems(?,?,?)', array("211402109", "0107078402", "dp2"));


        \DB::select('call accDospems(?,?,?)', array("211402104", "0107078405", "terima"));
        \DB::select('call accDospems(?,?,?)', array("211402104", "0107078406", "terima"));
        \DB::select('call accDospems(?,?,?)', array("211402105", "0107078401", "terima"));
        \DB::select('call accDospems(?,?,?)', array("211402105", "0107078402", "terima"));
        \DB::select('call accDospems(?,?,?)', array("211402106", "0107078403", "terima"));
        \DB::select('call accDospems(?,?,?)', array("211402106", "0107078406", "terima"));
        \DB::select('call accDospems(?,?,?)', array("211402107", "0107078405", "terima"));
        \DB::select('call accDospems(?,?,?)', array("211402107", "0107078404", "terima"));
        \DB::select('call accDospems(?,?,?)', array("211402108", "0107078406", "terima"));
        \DB::select('call accDospems(?,?,?)', array("211402108", "0107078403", "terima"));
        \DB::select('call accDospems(?,?,?)', array("211402109", "0107078401", "terima"));
        \DB::select('call accDospems(?,?,?)', array("211402109", "0107078402", "terima"));
    }
}
