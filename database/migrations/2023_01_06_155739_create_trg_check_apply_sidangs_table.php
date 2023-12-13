<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrgCheckApplySidangsTable extends Migration
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
        -- CREATE OR REPLACE TRIGGER `trg_check_applysidang` BEFORE UPDATE ON `prasidangs`
        -- FOR EACH ROW BEGIN

        -- IF( new.id_sidang IS NOT NULL AND (SELECT status FROM mahasiswas WHERE nim = new.nim) != 9)
        -- THEN

        -- SIGNAL SQLSTATE '45000'
        -- SET MESSAGE_TEXT = "Belum upload berkas";

        -- END IF;
        -- END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `trg_check_applysidang`
        SQL;
    }
}
