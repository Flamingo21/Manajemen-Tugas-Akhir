<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrgUpdatestat4ExumsTable extends Migration
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
        CREATE OR REPLACE TRIGGER `trg_updatestat_4_exum` AFTER UPDATE ON `prasempros`
        FOR EACH ROW BEGIN

        DECLARE hasil VARCHAR(10) DEFAULT "";

        SET hasil = (SELECT COUNT(*) FROM dospem_sempros
        WHERE accdp = "terima" AND id_sempro = old.id);

        IF(hasil = "2" AND (SELECT nilai_uji FROM prasempros WHERE id = old.id) IS NOT NULL) THEN
        UPDATE mahasiswas
        SET status = 4
        WHERE nim = old.nim;
        END IF;

        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `trg_updatestat_4_exum`
        SQL;
    }
}
