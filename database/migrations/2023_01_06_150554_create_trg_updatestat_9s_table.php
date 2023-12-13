<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrgUpdatestat9sTable extends Migration
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
        CREATE OR REPLACE TRIGGER `trg_updatestat_9` AFTER UPDATE ON `prasemhas`
        FOR EACH ROW BEGIN



        IF( (SELECT status FROM prasemhas WHERE id = old.id) = "terima") THEN
        UPDATE mahasiswas
        SET status = 9
        WHERE nim = (SELECT nim FROM prasemhas WHERE id = old.id_semhas);

        END IF;

        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `trg_updatestat_9`
        SQL;
    }
}
