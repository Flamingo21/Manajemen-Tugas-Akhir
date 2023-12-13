<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewsemprodsnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_sempro_dsn_view());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_sempro_dsn_view());
    }

    private function create_sempro_dsn_view(): string
    {
        return <<< SQL
            CREATE OR REPLACE VIEW sempro_dsn AS
            SELECT mhsdospem.nim, mhsdospem.nama, mhsdospem.status as statusmhs, mhsdospem.nidn, mhsdospem.namadsn, prasempros.id, prasempros.judul, prasempros.berkas_sempro, prasempros.status, prasempros.id_sempro
            FROM mhsdospem
            JOIN prasempros
            ON mhsdospem.nim = prasempros.nim;
            SQL;
    }

    private function drop_sempro_dsn_view(): string
    {
        return <<< SQL
        DROP VIEW IF EXISTS `sempro_dsn`
        SQL;
    }

}
