<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewdsnbandingsidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_dsn_banding_sidang_view());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_dsn_banding_sidang_view());
    }

    private function create_dsn_banding_sidang_view(): string
    {
        return <<< SQL
            CREATE OR REPLACE VIEW dsn_banding_sidang AS
            select banding_sidangs.id_prasidang, banding_sidangs.nidn, prasidangs.nim, prasidangs.judul, mahasiswas.nama, sidangs.tanggal, sidangs.jam, sidangs.tempat 
            from banding_sidangs
            join prasidangs
            on banding_sidangs.id_prasidang = prasidangs.id
            join mahasiswas
            on prasidangs.nim = mahasiswas.nim
            join sidangs
            on prasidangs.id_sidang = sidangs.id;
            SQL;
    }

    private function drop_dsn_banding_sidang_view(): string
    {
        return <<< SQL
        DROP VIEW IF EXISTS `dsn_banding_sidang`
        SQL;
    }

}