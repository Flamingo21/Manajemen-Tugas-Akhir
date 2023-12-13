<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogMahasiswasInsertsTable extends Migration
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
        CREATE OR REPLACE TRIGGER `log_mahasiswas_insert` AFTER INSERT ON `mahasiswas`
        FOR EACH ROW BEGIN

            INSERT INTO log_mahasiswas(log_type, user, nim, nama, status, created_at, updated_at)
            VALUES('insert', USER(), new.nim, new.nama, new.status, new.created_at, new.updated_at);

        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `log_mahasiswas_insert`
        SQL;
    }
}
