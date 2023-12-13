<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureaccprasidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_accPrasidang_procedure());
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_accPrasidang_procedure());
    }



    private function create_accPrasidang_procedure(): string
    {
        return <<< SQL
        CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE `accPrasidang`(IN `iddospem` VARCHAR(5), IN `acc` ENUM('terima', 'pending'))
        BEGIN
        UPDATE dospem_sidangs
        SET `accdp` = acc, `updated_at` = NOW()
        WHERE `id_dospem` = iddospem;
        END
        SQL;
    }

    private function drop_accPrasidang_procedure(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `accPrasidang`
        SQL;
    }
}
