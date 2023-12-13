<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogPrasemprosDeletesTable extends Migration
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
        CREATE OR REPLACE TRIGGER `log_prasempros_delete` AFTER delete ON `prasempros`
        FOR EACH ROW BEGIN

            INSERT INTO log_prasempros(log_type, user, id, nim, bidang, judul, diajukan_oleh, berkas_uji, nilai_uji, nilai_banding, catatan_uji, berkas_sempro, status, id_sempro, created_at, updated_at)
            VALUES('delete', USER(), old.id, old.nim, old.bidang, old.judul, old.diajukan_oleh, old.berkas_uji, old.nilai_uji, old.nilai_banding, old.catatan_uji, old.berkas_sempro, old.status, old.id_sempro, old.created_at, old.updated_at);

        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `log_prasempros_delete`
        SQL;
    }
}
