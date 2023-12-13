<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewdsnbandingsemhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_dsn_banding_semhas_view());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_dsn_banding_semhas_view());
    }

    private function create_dsn_banding_semhas_view(): string
    {
        return <<< SQL
            CREATE OR REPLACE VIEW dsn_banding_semhas AS
            select banding_semhas.id_prasemhas, banding_semhas.nidn, prasemhas.nim, prasemhas.judul, mahasiswas.nama, semhas.tanggal, semhas.jam, semhas.tempat 
            from banding_semhas
            join prasemhas
            on banding_semhas.id_prasemhas = prasemhas.id
            join mahasiswas
            on prasemhas.nim = mahasiswas.nim
            join semhas
            on prasemhas.id_semhas = semhas.id;
            SQL;
    }

    private function drop_dsn_banding_semhas_view(): string
    {
        return <<< SQL
        DROP VIEW IF EXISTS `dsn_banding_semhas`
        SQL;
    }

}
