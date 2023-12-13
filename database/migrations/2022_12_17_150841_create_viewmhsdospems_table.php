<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewmhsdospemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_mhsdospem_view());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_mhsdospem_view());
    }

    private function create_mhsdospem_view(): string
    {
        return <<< SQL
            CREATE OR REPLACE VIEW mhsdospem AS
            SELECT users.id, users.email, mahasiswas.nim, mahasiswas.nama, mahasiswas.status, dospems.nidn, dospems.statusdp, dospems.accdp, dosens.nama as namadsn
            FROM users
            JOIN mahasiswas
            ON users.noInduk = mahasiswas.nim
            JOIN dospems
            ON mahasiswas.nim = dospems.nim
            JOIN dosens
            ON dospems.nidn = dosens.nidn
            WHERE users.status = 'mahasiswa'
            SQL;
    }

    private function drop_mhsdospem_view(): string
    {
        return <<< SQL
        DROP VIEW IF EXISTS `mhsdospem`
        SQL;
    }

}
