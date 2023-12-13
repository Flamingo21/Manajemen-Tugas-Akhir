<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedurecreateprasemprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_buatPrasempro_procedure());
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_buatPrasempro_procedure());
    }



    private function create_buatPrasempro_procedure(): string
    {
        return <<< SQL

        CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE `buatPrasempro`(IN `nims` VARCHAR(64), IN `bidangs` VARCHAR(64), IN `juduls` VARCHAR(255), IN `ajukans` ENUM("mahasiswa","dosen","bersama"))
            BEGIN
        DECLARE MyField VARCHAR(255) DEFAULT "";
        DECLARE _continue INTEGER DEFAULT 0;
        DECLARE praid INTEGER DEFAULT 0;

        DECLARE MyCursor CURSOR FOR
            SELECT id FROM dospems WHERE nim = nims;
        DECLARE CONTINUE HANDLER FOR NOT FOUND
        SET _continue =1;
            INSERT INTO prasempros(`nim`, `bidang`, `judul`, `diajukan_oleh`, `created_at`) VALUES (nims, bidangs, juduls , ajukans, NOW());
        SET praid = LAST_INSERT_ID();
        OPEN MyCursor;
        getData: LOOP
        FETCH MyCursor INTO MyField;
            IF _continue = 1 THEN
            LEAVE getData;
            END IF;
        INSERT INTO dospem_sempros(`id_dospem`, `id_sempro`, `accdp`, `created_at`) VALUES (MyField, praid,"pending", NOW());
        END LOOP getData;
        CLOSE MyCursor;
        END
        SQL;
    }

    private function drop_buatPrasempro_procedure(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `buatPrasempro`
        SQL;
    }
}
