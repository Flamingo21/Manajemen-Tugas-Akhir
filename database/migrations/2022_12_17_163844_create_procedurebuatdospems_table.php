<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedurebuatdospemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_buatDospems_procedure());
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_buatDospems_procedure());
    }



    private function create_buatDospems_procedure(): string
    {
        return <<< SQL
        CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE `buatDospems`(IN `nim` VARCHAR(64), IN `nidn` VARCHAR(64), IN `statusdp` ENUM("dp1","dp2"))
        BEGIN
        DECLARE `_rollback` BOOL DEFAULT 0;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET `_rollback` = 1;

        START TRANSACTION;
                INSERT INTO dospems(`nim`, `nidn`, `statusdp`, `accdp`, `created_at`)
                VALUES (nim, nidn, statusdp , "pending", NOW());
                UPDATE mahasiswas
                SET status = "1"
                WHERE `nim` = nim;
                
                IF `_rollback` THEN
        ROLLBACK;
        ELSE
        COMMIT;
         END IF;
        END
        SQL;
    }

    private function drop_buatDospems_procedure(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `buatDospems`
        SQL;
    }
}
