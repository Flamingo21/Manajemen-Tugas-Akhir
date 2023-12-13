<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogPrasemhasUpdatesTable extends Migration
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
        CREATE OR REPLACE TRIGGER `log_prasemhas_update` AFTER update ON `prasemhas`
        FOR EACH ROW BEGIN

            INSERT INTO log_prasemhas(log_type, user, id, nim, judul, nilai_banding, berkas_semhas, status, id_semhas, created_at, updated_at)
            VALUES('update', USER(), old.id, old.nim, old.judul, old.nilai_banding, old.berkas_semhas, old.status, old.id_semhas, old.created_at, old.updated_at);

        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `log_prasemhas_update`
        SQL;
    }
}
