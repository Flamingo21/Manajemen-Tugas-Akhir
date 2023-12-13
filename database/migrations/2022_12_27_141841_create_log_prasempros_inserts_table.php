<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogPrasemprosInsertsTable extends Migration
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
        CREATE OR REPLACE TRIGGER `log_prasempros_insert` AFTER INSERT ON `prasempros`
        FOR EACH ROW BEGIN

            INSERT INTO log_prasempros(log_type, user, id, nim, bidang, judul, diajukan_oleh, berkas_uji, nilai_uji, nilai_banding, catatan_uji, berkas_sempro, status, id_sempro, created_at, updated_at)
            VALUES('insert', USER(), new.id, new.nim, new.bidang, new.judul, new.diajukan_oleh, new.berkas_uji, new.nilai_uji, new.nilai_banding, new.catatan_uji, new.berkas_sempro, new.status, new.id_sempro, new.created_at, new.updated_at);

        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `log_prasempros_insert`
        SQL;
    }
}
