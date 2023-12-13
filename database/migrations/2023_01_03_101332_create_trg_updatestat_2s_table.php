<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrgUpdatestat2sTable extends Migration
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
        CREATE OR REPLACE TRIGGER `trg_updatestat_2` AFTER UPDATE ON `dospems`
        FOR EACH ROW BEGIN

        DECLARE accDospem INTEGER DEFAULT 0;

        SET accDospem = (SELECT COUNT(*) FROM dospems
        WHERE nim = new.nim AND accdp ='terima');

        IF( accDospem = 2)
        THEN
        UPDATE mahasiswas
        SET status = 2
        WHERE nim = new.nim;
        END IF;


        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `trg_updatestat_2`
        SQL;
    }
}
