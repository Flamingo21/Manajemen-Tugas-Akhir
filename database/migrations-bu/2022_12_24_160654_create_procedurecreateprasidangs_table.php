<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedurecreateprasidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_buatPrasidang_procedure());
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_buatPrasidang_procedure());
    }



    private function create_buatPrasidang_procedure(): string
    {
        return <<< SQL

        CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE `buatPrasidangs`(IN `nims` VARCHAR(64), IN `juduls` VARCHAR(255))
            BEGIN
        DECLARE MyField VARCHAR(255) DEFAULT "";
        DECLARE _continue INTEGER DEFAULT 0;
        DECLARE praid INTEGER DEFAULT 0;

        DECLARE MyCursor CURSOR FOR
            SELECT id FROM dospems WHERE nim = nims;
        DECLARE CONTINUE HANDLER FOR NOT FOUND
        SET _continue =1;
            INSERT INTO prasidangs(`nim`, `judul`, `created_at`) VALUES (nims, juduls , NOW());
        SET praid = LAST_INSERT_ID();
        OPEN MyCursor;
        getData: LOOP
        FETCH MyCursor INTO MyField;
            IF _continue = 1 THEN
            LEAVE getData;
            END IF;
        INSERT INTO dospem_sidangs(`id_dospem`, `id_sidang`, `accdp`, `created_at`) VALUES (MyField, praid,"pending", NOW());
        END LOOP getData;
        CLOSE MyCursor;
        END
        SQL;
    }

    private function drop_buatPrasidang_procedure(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `buatPrasidangs`
        SQL;
    }
}

