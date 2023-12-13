<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrgCheckDospemsCreatePrasemprosTable extends Migration
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
        return<<< SQL
        CREATE OR REPLACE TRIGGER `trg_check_dospems_create_prasempros` BEFORE INSERT ON `prasempros`
        FOR EACH ROW BEGIN

        IF( (SELECT status FROM mahasiswas WHERE nim = new.nim) != 2 )
        THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = "status dosen pembimbing belum diterima";
        END IF;
        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `trg_check_dospems_create_prasempros`
        SQL;
    }
}

