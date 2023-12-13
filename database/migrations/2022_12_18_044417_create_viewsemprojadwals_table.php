<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewsemprojadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_sempro_jadwal_view());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_sempro_jadwal_view());
    }

    private function create_sempro_jadwal_view(): string
    {
        return <<< SQL
            CREATE OR REPLACE VIEW sempro_jadwal AS
            SELECT users.id, mahasiswas.nim, mahasiswas.nama, prasempros.id as id_sempro, prasempros.judul, sempros.tanggal, sempros.jam, sempros.tempat
            FROM users
            JOIN mahasiswas
            ON users.noInduk = mahasiswas.nim
            JOIN prasempros
            ON mahasiswas.nim = prasempros.nim
            JOIN sempros
            ON prasempros.id_sempro = sempros.id
            WHERE users.status = 'mahasiswa';
            SQL;
    }

    private function drop_sempro_jadwal_view(): string
    {
        return <<< SQL
        DROP VIEW IF EXISTS `sempro_jadwal`
        SQL;
    }

}
