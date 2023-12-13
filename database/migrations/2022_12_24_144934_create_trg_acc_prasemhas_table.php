<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrgAccPrasemhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->create_trg_accPrasemhas_trigger());
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->drop_trg_accPrasemhas_trigger());
    }



    private function create_trg_accPrasemhas_trigger(): string
    {
        return <<< SQL
        CREATE OR REPLACE TRIGGER trg_accPrasemhas AFTER UPDATE ON `dospem_semhas` FOR EACH ROW
            BEGIN

            DECLARE hasil VARCHAR(10) DEFAULT "";

            SET hasil = (SELECT COUNT(*) FROM dospem_semhas
            WHERE accdp = "terima" AND id_semhas = old.id_semhas);

                IF(hasil = "2") THEN
                   UPDATE prasemhas
                   SET status = "terima", updated_at = now()
                   WHERE id = old.id_semhas;
                END IF;
            END
        SQL;
    }

    private function drop_trg_accPrasemhas_trigger(): string
    {
        return <<< SQL
        DROP trigger IF EXISTS `trg_accPrasemhas`
        SQL;
    }
}
