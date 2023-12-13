<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrgCheckApplySemprosTable extends Migration
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
        -- CREATE OR REPLACE TRIGGER `trg_check_applySempro` BEFORE UPDATE ON `prasempros`
        -- FOR EACH ROW BEGIN

        -- IF( new.id_sempro IS NOT NULL AND (SELECT status FROM mahasiswas WHERE nim = new.nim) != 5)
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
        DROP procedure IF EXISTS `trg_check_applySempro`
        SQL;
    }
}
