<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrgAccPrasidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_trg_accPrasidang_trigger());
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_trg_accPrasidang_trigger());
    }



    private function create_trg_accPrasidang_trigger(): string
    {
        return <<< SQL
        CREATE OR REPLACE TRIGGER trg_accPrasidang AFTER UPDATE ON `dospem_sidangs` FOR EACH ROW
            BEGIN

            DECLARE hasil VARCHAR(10) DEFAULT "";

            SET hasil = (SELECT COUNT(*) FROM dospem_sidangs
            WHERE accdp = "terima" AND id_sidang = old.id_sidang);

                IF(hasil = "2") THEN
                   UPDATE prasidangs
                   SET status = "terima", updated_at = now()
                   WHERE id = old.id_sidang;
                END IF;
            END
        SQL;
    }

    private function drop_trg_accPrasidang_trigger(): string
    {
        return <<< SQL
        DROP trigger IF EXISTS `trg_accPrasidang`
        SQL;
    }
}
