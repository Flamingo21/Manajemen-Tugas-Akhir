<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureaccdospemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_accDospems_procedure());
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_accDospems_procedure());
    }



    private function create_accDospems_procedure(): string
    {
        return <<< SQL
        CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE `accDospems`(IN `nimm` VARCHAR(64), IN `nidnn` VARCHAR(64), IN `accdp` ENUM('tolak', 'terima', 'pending'))
        BEGIN
                UPDATE dospems
                SET `accdp` = accdp, `updated_at` = NOW()
                WHERE `nim` = nimm AND `nidn` = nidnn;
        END
        SQL;
    }

    private function drop_accDospems_procedure(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `accDospems`
        SQL;
    }
}
