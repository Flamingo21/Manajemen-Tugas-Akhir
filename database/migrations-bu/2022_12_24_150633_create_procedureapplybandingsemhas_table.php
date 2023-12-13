<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureapplybandingsemhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_semhas_procedure());
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_semhas_procedure());
    }



    private function create_semhas_procedure(): string
    {
        return <<< SQL
        CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE `applyBandingSemhas`(IN `idprasem` VARCHAR(64), IN `iddosen` VARCHAR(64))
        BEGIN
        DECLARE nidns VARCHAR(64) DEFAULT "";
        SET nidns = (SELECT nidn FROM dospems WHERE id = iddosen);
        INSERT INTO banding_semhas(`id_prasemhas`, `nidn`, `created_at`) VALUES (idprasem, nidns, NOW());
        END

        SQL;
    }

    private function drop_semhas_procedure(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `applyBandingSemhas`
        SQL;
    }
}
