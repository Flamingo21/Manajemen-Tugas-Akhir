<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrgReratanilaisemprosTable extends Migration
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

        CREATE OR REPLACE TRIGGER `trg_rerataNilaiSempro` AFTER UPDATE ON `banding_sempros`
        FOR EACH ROW BEGIN

        DECLARE hasil DOUBLE(4,2);
        DECLARE jmlhsmua INTEGER DEFAULT 0;
        DECLARE jmlhnotnull INTEGER DEFAULT 0;

        DECLARE nims VARCHAR(255) DEFAULT '';
        DECLARE juduls VARCHAR(255) DEFAULT '';


        SET jmlhnotnull = (SELECT COUNT(*) FROM banding_sempros
        WHERE id_prasempro = old.id_prasempro AND nilai IS NOT NULL);


        SET jmlhsmua = (SELECT COUNT(*) FROM banding_sempros
        WHERE id_prasempro = old.id_prasempro);

        SET nims = (SELECT nim FROM prasempros WHERE id = old.id_prasempro);
        SET juduls = (SELECT judul FROM prasempros WHERE id = old.id_prasempro);

        IF(jmlhnotnull = jmlhsmua) THEN
        SET hasil = (SELECT AVG(nilai) FROM banding_sempros
        WHERE id_prasempro = old.id_prasempro);
        IF(hasil>=70) THEN
           UPDATE prasempros
           SET nilai_banding = hasil, status = "lulus", updated_at = now()
           WHERE id = old.id_prasempro;
            CALL buatPrasemhas(nims, juduls);
           ELSE
           UPDATE prasempros
           SET nilai_banding = hasil, status = "tolak", updated_at = now()
           WHERE id = old.id_prasempro;
        END IF;
        END IF;
        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `trg_rerataNilaiSempro`
        SQL;
    }
}
