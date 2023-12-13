<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewsemhasdsnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_semhas_dsn_view());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_semhas_dsn_view());
    }

    private function create_semhas_dsn_view(): string
    {
        return <<< SQL
            CREATE OR REPLACE VIEW semhas_dsn AS
            SELECT mhsdospem.nim, mhsdospem.nama, mhsdospem.status as statusmhs, mhsdospem.nidn, mhsdospem.namadsn, prasemhas.id, prasemhas.judul, prasemhas.berkas_semhas, prasemhas.status, prasemhas.id_semhas
            FROM mhsdospem
            JOIN prasemhas
            ON mhsdospem.nim = prasemhas.nim;
            SQL;
    }

    private function drop_semhas_dsn_view(): string
    {
        return <<< SQL
        DROP VIEW IF EXISTS `semhas_dsn`
        SQL;
    }

}
