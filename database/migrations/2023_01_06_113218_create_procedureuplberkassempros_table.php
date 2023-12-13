<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureuplberkassemprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_procedure());
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_procedure());
    }



    private function create_procedure(): string
    {
        return <<< SQL
        CREATE OR REPLACE DEFINER=`root`@`localhost` PROCEDURE `uplBerkasSempros`(IN `idprasem` VARCHAR(5), IN `berkas` VARCHAR(255))
        BEGIN

        IF( (SELECT status FROM mahasiswas WHERE nim = (SELECT nim FROM prasempros WHERE id = idprasem) ) != 4 )
        THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = "Judul belum diterima Dospem atau Nilai uji belum keluar";
        ELSE
        UPDATE prasempros
        SET `berkas_sempro` = berkas, `updated_at` = NOW()
        WHERE `id` = idprasem;

        END IF;
        END
        SQL;
    }

    private function drop_procedure(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `uplBerkasSempros`
        SQL;
    }
}
