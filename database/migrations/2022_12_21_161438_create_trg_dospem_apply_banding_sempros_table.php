<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrgDospemApplyBandingSemprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_trigger());
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_trigger());
    }



    private function create_trigger(): string
    {
        return <<< SQL

        CREATE OR REPLACE procedure `procedure_dospemApplyBandingSempro` ( IN `idsempro` VARCHAR(64))
        BEGIN

        DECLARE MyField VARCHAR(255) DEFAULT "";
        DECLARE _continue INTEGER DEFAULT 0;
        DECLARE `_rollback` BOOL DEFAULT 0;
        DECLARE MyCursor CURSOR FOR
        SELECT id_dospem FROM dospem_sempros WHERE id_sempro = idsempro;

        DECLARE CONTINUE HANDLER FOR NOT FOUND SET _continue = TRUE;

        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET `_rollback` = 1;

        START TRANSACTION;
        OPEN MyCursor;

        getData: LOOP
        FETCH MyCursor INTO MyField;
        IF _continue = 1 THEN
        LEAVE getData;
        END IF;
        CALL applyBandingSempro(idsempro, MyField);
        END LOOP getData;
        CLOSE MyCursor;
        IF `_rollback` THEN
        ROLLBACK;
        ELSE
        COMMIT;
        END IF;
        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `procedure_dospemApplyBandingSempro`
        SQL;
    }
}
