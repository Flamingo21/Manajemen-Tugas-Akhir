<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogUsersUpdatesTable extends Migration
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
        CREATE OR REPLACE TRIGGER `log_users_update` AFTER update ON `users`
        FOR EACH ROW BEGIN

            INSERT INTO log_users(log_type, user, id, noInduk, email, password, status, created_at, updated_at)
            VALUES('update', USER(), old.id, old.noInduk, old.email, old.password, old.status, old.created_at, old.updated_at);

        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `log_users_update`
        SQL;
    }
}
