<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureaccprasemprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_accPrasempro_procedure());
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_accPrasempro_procedure());
    }



    private function create_accPrasempro_procedure(): string
    {
        return <<< SQL
        CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE `accPrasempro`(IN `iddospem` VARCHAR(5), IN `acc` ENUM('terima', 'pending'))
        BEGIN
        UPDATE dospem_sempros
        SET `accdp` = acc, `updated_at` = NOW()
        WHERE `id_dospem` = iddospem;
        END
        SQL;
    }

    private function drop_accPrasempro_procedure(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `accPrasempro`
        SQL;
    }
}
