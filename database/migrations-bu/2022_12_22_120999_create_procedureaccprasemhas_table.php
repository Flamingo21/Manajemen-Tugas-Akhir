<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureaccprasemhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_accPrasemhas_procedure());
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_accPrasemhas_procedure());
    }



    private function create_accPrasemhas_procedure(): string
    {
        return <<< SQL
        CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE `accPrasemhas`(IN `iddospem` VARCHAR(5), IN `acc` ENUM('terima', 'pending'))
        BEGIN
        UPDATE dospem_semhas
        SET `accdp` = acc, `updated_at` = NOW()
        WHERE `id_dospem` = iddospem;
        END
        SQL;
    }

    private function drop_accPrasemhas_procedure(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `accPrasemhas`
        SQL;
    }
}
