<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewakunmhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_akunmhs_view());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_akunmhs_view());
    }

    private function create_akunmhs_view(): string
    {
        return <<< SQL
            CREATE OR REPLACE VIEW akunmhs AS
            SELECT users.id, users.email, mahasiswas.nim, mahasiswas.nama, mahasiswas.status
            FROM users
            JOIN mahasiswas
            ON users.noInduk = mahasiswas.nim
            WHERE users.status = 'mahasiswa'
            SQL;
    }

    private function drop_akunmhs_view(): string
    {
        return <<< SQL
        DROP VIEW IF EXISTS `akunmhs`
        SQL;
    }

}