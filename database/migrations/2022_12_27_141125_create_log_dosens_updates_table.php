<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogDosensUpdatesTable extends Migration
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
        CREATE OR REPLACE TRIGGER `log_dosens_update` AFTER UPDATE ON `dosens`
        FOR EACH ROW BEGIN

            INSERT INTO log_dosens(log_type, user, nidn, nama, created_at, updated_at)
            VALUES('update', USER(), old.nidn, old.nama, old.created_at, old.updated_at);

        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `log_dosens_update`
        SQL;
    }
}
