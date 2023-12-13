<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewsidangdsnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_sidang_dsn_view());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_sidang_dsn_view());
    }

    private function create_sidang_dsn_view(): string
    {
        return <<< SQL
            CREATE OR REPLACE VIEW sidang_dsn AS
            SELECT mhsdospem.nim, mhsdospem.nama, mhsdospem.status as statusmhs, mhsdospem.nidn, mhsdospem.namadsn, prasidangs.id, prasidangs.judul, prasidangs.berkas_sidang, prasidangs.status, prasidangs.id_sidang
            FROM mhsdospem
            JOIN prasidangs
            ON mhsdospem.nim = prasidangs.nim;
            SQL;
    }

    private function drop_sidang_dsn_view(): string
    {
        return <<< SQL
        DROP VIEW IF EXISTS `sidang_dsn`
        SQL;
    }

}
