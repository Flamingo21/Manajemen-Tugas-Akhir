<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewmhsdsnbimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_mhsdsnbim_view());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_mhsdsnbim_view());
    }

    private function create_mhsdsnbim_view(): string
    {
        return <<< SQL
            CREATE OR REPLACE VIEW mhs_dsn_bim AS
            SELECT users.id, mahasiswas.nim, mahasiswas.nama, dospems.nidn, dospems.statusdp, dosens.nama as namadsn, bimbingans.catatan, bimbingans.created_at
            FROM users
            JOIN mahasiswas
            ON users.noInduk = mahasiswas.nim
            JOIN dospems
            ON mahasiswas.nim = dospems.nim
            JOIN dosens
            ON dospems.nidn = dosens.nidn
            RIGHT JOIN bimbingans
            ON mahasiswas.nim = bimbingans.nim
            WHERE users.status = 'mahasiswa'
            SQL;
    }

    private function drop_mhsdsnbim_view(): string
    {
        return <<< SQL
        DROP VIEW IF EXISTS `mhs_dsn_bim`
        SQL;
    }

}
