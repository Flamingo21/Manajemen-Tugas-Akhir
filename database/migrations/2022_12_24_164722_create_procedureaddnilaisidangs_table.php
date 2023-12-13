<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureaddnilaisidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_sidang_procedure());
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_sidang_procedure());
    }



    private function create_sidang_procedure(): string
    {
        return <<< SQL
        CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE `addnilaiSidang`(IN `idprasem` VARCHAR(5), IN `nidns` VARCHAR(64), IN `nilais` DOUBLE(4,2))
        BEGIN
        UPDATE banding_sidangs
        SET `nilai` = nilais, `updated_at` = NOW()
        WHERE `id_prasidang` = idprasem AND `nidn` = nidns;
        END
        SQL;
    }

    private function drop_sidang_procedure(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `addnilaiSidang`
        SQL;
    }
}
