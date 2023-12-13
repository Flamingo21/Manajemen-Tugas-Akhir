<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogMahasiswasDeletesTable extends Migration
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
        CREATE OR REPLACE TRIGGER `log_mahasiswas_delete` AFTER delete ON `mahasiswas`
        FOR EACH ROW BEGIN

            INSERT INTO log_mahasiswas(log_type, user, nim, nama, status, created_at, updated_at)
            VALUES('delete', USER(), old.nim, old.nama, old.status, old.created_at, old.updated_at);

        END
        SQL;
    }

    private function drop_trigger(): string
    {
        return <<< SQL
        DROP procedure IF EXISTS `log_mahasiswas_delete`
        SQL;
    }
}
