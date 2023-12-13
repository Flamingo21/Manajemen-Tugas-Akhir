<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogBandingSemprosUpdatesTable extends Migration
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
        CREATE OR REPLACE TRIGGER `log_banding_sempros_update` AFTER update ON `banding_sempros`
        FOR EACH ROW BEGIN

            INSERT INTO log_banding_sempros(log_type, user, id, id_prasempro, nidn, nilai, created_at, updated_at)
            VALUES('update', USER(), old.id, old.id_prasempro, old.nidn, old.nilai, old.created_at, old.updated_at);

        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `log_banding_sempros_update`
        SQL;
    }
}
