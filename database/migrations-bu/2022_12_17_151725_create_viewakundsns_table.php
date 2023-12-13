<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewakundsnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_akundsn_view());
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_akundsn_view());
    }



    private function create_akundsn_view(): string
    {
        return <<< SQL
            CREATE OR REPLACE VIEW akundsn AS
            SELECT users.id, users.email, dosens.nidn, dosens.nama
            FROM users
            JOIN dosens
            ON users.noInduk = dosens.nidn
            WHERE users.status = 'dosen'
            SQL;
    }

    private function drop_akundsn_view(): string
    {
        return <<< SQL
        DROP VIEW IF EXISTS `akundsn`
        SQL;
    }
}
