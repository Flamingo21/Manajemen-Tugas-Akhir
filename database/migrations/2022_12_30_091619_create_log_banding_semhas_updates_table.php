<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogBandingSemhasUpdatesTable extends Migration
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
        CREATE OR REPLACE TRIGGER `log_banding_semhas_update` AFTER update ON `banding_semhas`
        FOR EACH ROW BEGIN

            INSERT INTO log_banding_semhas(log_type, user, id, id_prasemhas, nidn, nilai, created_at, updated_at)
            VALUES('update', USER(), old.id, old.id_prasemhas, old.nidn, old.nilai, old.created_at, old.updated_at);

        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `log_banding_semhas_update`
        SQL;
    }
}
