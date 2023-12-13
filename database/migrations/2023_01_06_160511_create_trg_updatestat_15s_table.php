<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrgUpdatestat15sTable extends Migration
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
        CREATE OR REPLACE TRIGGER `trg_updatestat_15` AFTER UPDATE ON `prasidangs`
        FOR EACH ROW BEGIN



        IF( (SELECT status FROM prasidangs WHERE id = old.id) = "lulus") THEN
        UPDATE mahasiswas
        SET status = 15
        WHERE nim = (SELECT nim FROM prasidangs WHERE id = old.id_sidang);

        END IF;

        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `trg_updatestat_15`
        SQL;
    }
}

