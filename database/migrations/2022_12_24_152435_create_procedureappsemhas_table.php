<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureappsemhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_semhas_procedure());
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_semhas_procedure());
    }



    private function create_semhas_procedure(): string
    {
        return <<< SQL

        CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE `addSemhas`(IN `idprasem` VARCHAR(64), IN `idsemhas` VARCHAR(64))
        BEGIN
        DECLARE `_rollback` BOOL DEFAULT 0;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET `_rollback` = 1;

        START TRANSACTION;
        UPDATE prasemhas
        SET id_semhas = idsemhas,  `updated_at` = NOW()
        WHERE `id` = idprasem;
        CALL procedure_dospemApplyBandingSemhas(idsemhas);
        IF `_rollback` THEN
        ROLLBACK;
        ELSE
        COMMIT;
        END IF;
        END
        SQL;
    }

    private function drop_semhas_procedure(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `addSemhas`
        SQL;
    }
}
