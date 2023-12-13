<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrgReratanilaisidangsTable extends Migration
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

        CREATE OR REPLACE TRIGGER `trg_rerataNilaiSidang` AFTER UPDATE ON `banding_sidangs`
        FOR EACH ROW BEGIN

        DECLARE hasil DOUBLE(4,2);
        DECLARE jmlhsmua INTEGER DEFAULT 0;
        DECLARE jmlhnotnull INTEGER DEFAULT 0;

        DECLARE nims VARCHAR(255) DEFAULT '';
        DECLARE juduls VARCHAR(255) DEFAULT '';


        SET jmlhnotnull = (SELECT COUNT(*) FROM banding_sidangs
        WHERE id_prasidang = old.id_prasidang AND nilai IS NOT NULL);


        SET jmlhsmua = (SELECT COUNT(*) FROM banding_sidangs
        WHERE id_prasidang = old.id_prasidang);

        SET nims = (SELECT nim FROM prasidangs WHERE id = old.id_prasidang);
        SET juduls = (SELECT judul FROM prasidangs WHERE id = old.id_prasidang);

        IF(jmlhnotnull = jmlhsmua) THEN
        SET hasil = (SELECT AVG(nilai) FROM banding_sidangs
        WHERE id_prasidang = old.id_prasidang);
        IF(hasil>=70) THEN
           UPDATE prasidangs
           SET nilai_banding = hasil, status = "lulus", updated_at = now()
           WHERE id = old.id_prasidang;
        --    UPDATE mahasiswas
        --     SET status = "6"
        --     WHERE `nim` = (SELECT nim FROM prasidangs WHERE id = old.id_prasidang);

           ELSE
           UPDATE prasidangs
           SET nilai_banding = hasil, status = "tolak", updated_at = now()
           WHERE id = old.id_prasidang;
        END IF;
        END IF;
        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `trg_rerataNilaiSidang`
        SQL;
    }
}
