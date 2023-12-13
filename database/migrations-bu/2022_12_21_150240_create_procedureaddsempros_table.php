<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureaddsemprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_Sempros_procedure());
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_Sempros_procedure());
    }



    private function create_Sempros_procedure(): string
    {
        return <<< SQL

        CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE `addSempro`(IN `idprasem` VARCHAR(64), IN `idsempro` VARCHAR(64))
        BEGIN
        UPDATE prasempros
        SET id_sempro = idsempro,  `updated_at` = NOW()
        WHERE `id` = idprasem;
        CALL procedure_dospemApplyBandingSempro(idsempro);
        END
        SQL;
    }

    private function drop_Sempros_procedure(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `addSempro`
        SQL;
    }
}
