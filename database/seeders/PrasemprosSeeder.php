<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrasemprosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::select('call buatPrasempro(?,?,?,?,?)', array("211402101", "Animasi", "Perancangan Animasi 3 Dimensi Alur Pengurusan Administrasi Pasien Uumum", "mahasiswa", "test"));
        \DB::select('call buatPrasempro(?,?,?,?,?)', array("211402102", "Database", "Pembuatan database untuk penyimpanan data polisi sektor", "dosen", "test"));
        \DB::select('call buatPrasempro(?,?,?,?,?)', array("211402103", "Viritual Reality", "Penerapan Viritual Reality untuk mengobati pasien gangguan jiwa", "bersama", "test"));


        \DB::select('call accPrasempro(?,?)', array("1", "terima"));
        \DB::select('call accPrasempro(?,?)', array("2", "terima"));
        \DB::select('call accPrasempro(?,?)', array("3", "pending"));
        \DB::select('call accPrasempro(?,?)', array("4", "pending"));
        \DB::select('call accPrasempro(?,?)', array("5", "pending"));
        \DB::select('call accPrasempro(?,?)', array("6", "terima"));

        \DB::select('call addnilaiUji(?,?)', array("1", 80));

        \DB::select('call uplBerkasSempros(?,?)', array("1", "berkas"));


        \DB::select('call buatSempros(?,?,?)', array("2022-12-30", "16:00:00", "Ruang Pertemuan 1"));
        \DB::select('call addSempro(?,?)', array("1", "1"));

        \DB::select('call addnilaiSempro(?,?,?)', array("1", "0107078401",80));
        \DB::select('call addnilaiSempro(?,?,?)', array("1", "0107078402",90));


        // \DB::select('call applyBandingSempro(?,?)', array("1", "1"));

        // \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // \DB::table('prasempros')->truncate();
        // \DB::table('prasempros')->insert([
        //     [
        //         'id' => '1',
        //         'nim' => '211402041',
        //         'bidang' => 'Animasi',
        //         'judul' => 'Perancangan Animasi 3 Dimensi Alur Pengurusan Administrasi Pasien Uumum',
        //         'diajukan_oleh' => 'mahasiswa',
        //         'berkas_uji' => '',
        //         'uji_kelayakan' => '',
        //         'catatan_uji' => '',
        //         'berkas_sempro' => '',
        //         'acc_dp1' => 'pending',
        //         'acc_dp2' => 'pending',
        //         'created_at' => now(),
        //     ],

        // ]);
    }
}
