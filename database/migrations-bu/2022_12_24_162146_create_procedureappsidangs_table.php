<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureappsidangsTable extends Migration
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

        CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE `addSidang`(IN `idprasem` VARCHAR(64), IN `idsidang` VARCHAR(64))
        BEGIN
        UPDATE prasidangs
        SET id_sidang = idsidang,  `updated_at` = NOW()
        WHERE `id` = idprasem;
        CALL procedure_dospemApplyBandingsidang(idsidang);
        END
        SQL;
    }

    private function drop_sidang_procedure(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `addSidang`
        SQL;
    }
}
