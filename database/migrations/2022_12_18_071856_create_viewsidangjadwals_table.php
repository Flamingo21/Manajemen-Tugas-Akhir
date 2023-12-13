<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewsidangjadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_sidang_jadwal_view());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_sidang_jadwal_view());
    }

    private function create_sidang_jadwal_view(): string
    {
        return <<< SQL
            CREATE OR REPLACE VIEW sidang_jadwal AS
            SELECT users.id, mahasiswas.nim, mahasiswas.nama, prasidangs.id as id_sidang, prasidangs.judul, sidangs.tanggal, sidangs.jam, sidangs.tempat
            FROM users
            JOIN mahasiswas
            ON users.noInduk = mahasiswas.nim
            JOIN prasidangs
            ON mahasiswas.nim = prasidangs.nim
            JOIN sidangs
            ON prasidangs.id_sidang = sidangs.id
            WHERE users.status = 'mahasiswa';
            SQL;
    }

    private function drop_sidang_jadwal_view(): string
    {
        return <<< SQL
        DROP VIEW IF EXISTS `sidang_jadwal`
        SQL;
    }

}

