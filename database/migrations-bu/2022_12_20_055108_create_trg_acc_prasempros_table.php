<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrgAccPrasemprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_trg_accPrasempro_trigger());
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_trg_accPrasempro_trigger());
    }



    private function create_trg_accPrasempro_trigger(): string
    {
        return <<< SQL
        CREATE OR REPLACE TRIGGER trg_accPrasempro AFTER UPDATE ON `dospem_sempros` FOR EACH ROW
            BEGIN

            DECLARE hasil VARCHAR(10) DEFAULT "";

            SET hasil = (SELECT COUNT(*) FROM dospem_sempros
            WHERE accdp = "terima" AND id_sempro = old.id_sempro);

                IF(hasil = "2") THEN
                   UPDATE prasempros
                   SET status = "terima", updated_at = now()
                   WHERE id = old.id_sempro;
                END IF;
            END
        SQL;
    }

    private function drop_trg_accPrasempro_trigger(): string
    {
        return <<< SQL
        DROP trigger IF EXISTS `trg_accPrasempro`
        SQL;
    }
}
