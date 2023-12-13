<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureaddnilaisemhasTable extends Migration
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
        CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE `addnilaiSemhas`(IN `idprasem` VARCHAR(5), IN `nidns` VARCHAR(64), IN `nilais` DOUBLE(4,2))
        BEGIN
        UPDATE banding_semhas
        SET `nilai` = nilais, `updated_at` = NOW()
        WHERE `id_prasemhas` = idprasem AND `nidn` = nidns;
        END
        SQL;
    }

    private function drop_semhas_procedure(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `addnilaiSemhas`
        SQL;
    }
}
