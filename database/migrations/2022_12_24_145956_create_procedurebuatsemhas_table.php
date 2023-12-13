<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedurebuatsemhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_buatsemhas_procedure());
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_buatsemhas_procedure());
    }



    private function create_buatsemhas_procedure(): string
    {
        return <<< SQL

        CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE `buatSemhas`(IN `tgl` DATE, IN `jams` TIME, IN `place` VARCHAR(255))
        BEGIN
            INSERT INTO semhas(`tanggal`, `jam`, `tempat`, `created_at`)
            VALUES (tgl, jams, place, NOW());
        END
        SQL;
    }

    private function drop_buatsemhas_procedure(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `buatsemhas`
        SQL;
    }
}
