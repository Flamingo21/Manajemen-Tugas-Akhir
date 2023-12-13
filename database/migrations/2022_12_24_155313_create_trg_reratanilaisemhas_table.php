<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrgReratanilaisemhasTable extends Migration
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

        CREATE OR REPLACE TRIGGER `trg_rerataNilaiSemhas` AFTER UPDATE ON `banding_semhas`
        FOR EACH ROW BEGIN

        DECLARE hasil DOUBLE(4,2);
        DECLARE jmlhsmua INTEGER DEFAULT 0;
        DECLARE jmlhnotnull INTEGER DEFAULT 0;

        DECLARE nims VARCHAR(255) DEFAULT '';
        DECLARE juduls VARCHAR(255) DEFAULT '';


        SET jmlhnotnull = (SELECT COUNT(*) FROM banding_semhas
        WHERE id_prasemhas = old.id_prasemhas AND nilai IS NOT NULL);


        SET jmlhsmua = (SELECT COUNT(*) FROM banding_semhas
        WHERE id_prasemhas = old.id_prasemhas);

        SET nims = (SELECT nim FROM prasemhas WHERE id = old.id_prasemhas);
        SET juduls = (SELECT judul FROM prasemhas WHERE id = old.id_prasemhas);

        IF(jmlhnotnull = jmlhsmua) THEN
        SET hasil = (SELECT AVG(nilai) FROM banding_semhas
        WHERE id_prasemhas = old.id_prasemhas);
        IF(hasil>=70) THEN
           UPDATE prasemhas
           SET nilai_banding = hasil, status = "lulus", updated_at = now()
           WHERE id = old.id_prasemhas;
            CALL buatPrasidangs(nims, juduls);
           ELSE
           UPDATE prasemhas
           SET nilai_banding = hasil, status = "tolak", updated_at = now()
           WHERE id = old.id_prasemhas;
        END IF;
        END IF;
        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `trg_rerataNilaiSemhas`
        SQL;
    }
}
