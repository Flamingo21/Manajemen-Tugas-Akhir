<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogBandingSidangInsertsTable extends Migration
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
        CREATE OR REPLACE TRIGGER `log_banding_sidangs_insert` AFTER INSERT ON `banding_sidangs`
        FOR EACH ROW BEGIN

            INSERT INTO log_banding_sidangs(log_type, user, id, id_prasidang, nidn, nilai, created_at, updated_at)
            VALUES('insert', USER(), new.id, new.id_prasidang, new.nidn, new.nilai, new.created_at, new.updated_at);

        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `log_banding_sidangs_insert`
        SQL;
    }
}
