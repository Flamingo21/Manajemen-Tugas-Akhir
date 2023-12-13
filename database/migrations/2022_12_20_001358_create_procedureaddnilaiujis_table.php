<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureaddnilaiujisTable extends Migration
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
        CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE `addnilaiUji`(IN `idprasem` VARCHAR(5), IN `nilais` DOUBLE(4,2))
        BEGIN
        DECLARE `_rollback` BOOL DEFAULT 0;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET `_rollback` = 1;

        START TRANSACTION;
        IF(nilais>75)
        THEN
        UPDATE prasempros
        SET `nilai_uji` = nilais, status = "terima", `updated_at` = NOW()
        WHERE `id` = idprasem;
        ELSE
        UPDATE prasempros
        SET `nilai_uji` = nilais, status = "tolak", `updated_at` = NOW()
        WHERE `id` = idprasem;
        END IF;
        IF `_rollback` THEN
        ROLLBACK;
         ELSE
        COMMIT;
        END IF;
        END
        SQL;
    }

    private function drop_Sempros_procedure(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `addnilaiUji`
        SQL;
    }
}
