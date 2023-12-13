<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewsemhasjadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_semhas_jadwal_view());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_semhas_jadwal_view());
    }

    private function create_semhas_jadwal_view(): string
    {
        return <<< SQL
            CREATE OR REPLACE VIEW semhas_jadwal AS
            SELECT users.id, mahasiswas.nim, mahasiswas.nama, prasemhas.id as id_semhas, prasemhas.judul, semhas.tanggal, semhas.jam, semhas.tempat
            FROM users
            JOIN mahasiswas
            ON users.noInduk = mahasiswas.nim
            JOIN prasemhas
            ON mahasiswas.nim = prasemhas.nim
            JOIN semhas
            ON prasemhas.id_semhas = semhas.id
            WHERE users.status = 'mahasiswa';
            SQL;
    }

    private function drop_semhas_jadwal_view(): string
    {
        return <<< SQL
        DROP VIEW IF EXISTS `semhas_jadwal`
        SQL;
    }

}

