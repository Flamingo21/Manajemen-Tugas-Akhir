<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogPrasidangsInsertsTable extends Migration
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
        CREATE OR REPLACE TRIGGER `log_prasidangs_insert` AFTER INSERT ON `prasidangs`
        FOR EACH ROW BEGIN

            INSERT INTO log_prasidangs(log_type, user, id, nim, judul, nilai_banding, berkas_sidang, status, id_sidang, created_at, updated_at)
            VALUES('insert', USER(), new.id, new.nim, new.judul, new.nilai_banding, new.berkas_sidang, new.status, new.id_sidang, new.created_at, new.updated_at);

        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `log_prasidangs_insert`
        SQL;
    }
}
