<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewdsnbandingsemprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_dsn_banding_sempro_view());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_dsn_banding_sempro_view());
    }

    private function create_dsn_banding_sempro_view(): string
    {
        return <<< SQL
            CREATE OR REPLACE VIEW dsn_banding_sempro AS
            select banding_sempros.id_prasempro, banding_sempros.nidn, prasempros.nim, prasempros.judul, mahasiswas.nama, sempros.tanggal, sempros.jam, sempros.tempat 
            from banding_sempros
            join prasempros
            on banding_sempros.id_prasempro = prasempros.id
            join mahasiswas
            on prasempros.nim = mahasiswas.nim
            join sempros
            on prasempros.id_sempro = sempros.id;
            SQL;
    }

    private function drop_dsn_banding_sempro_view(): string
    {
        return <<< SQL
        DROP VIEW IF EXISTS `dsn_banding_sempro`
        SQL;
    }

}
