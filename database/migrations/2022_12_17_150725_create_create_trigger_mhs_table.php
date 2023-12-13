<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateTriggerMhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::unprepared('
        DROP PROCEDURE IF EXISTS `buatAkun`;
        CREATE PROCEDURE `buatAkun`(IN `mail` VARCHAR(64), IN `password` VARCHAR(64), IN `status` ENUM("mahasiswa","dosen","staff"), IN `induk` VARCHAR(64), IN `nama` VARCHAR(64))
        BEGIN
        DECLARE `_rollback` BOOL DEFAULT 0;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET `_rollback` = 1;

        START TRANSACTION;
	    IF(status = "mahasiswa") THEN
                INSERT INTO users(`noInduk`, `password`, `email`, `status`, `created_at`)
                VALUES (induk, password, mail , status, now());
                INSERT INTO mahasiswas (`nim`, `nama`, `created_at`, `updated_at`)
                VALUES (induk, nama, now(), null);


        ELSEIF(status = "dosen") THEN
        INSERT INTO users(`noInduk`, `password`, `email`, `status`, `created_at`)
        VALUES (induk, password, mail , status, now());
                INSERT INTO dosens(`nidn`, `nama`,`created_at`, `updated_at`)
                VALUES (induk, nama, now(), null);

        ELSEIF(status = "staff") THEN
        INSERT INTO users(`noInduk`, `password`, `email`, `status`, `created_at`)
        VALUES (induk, password, mail , status, now());
        END IF;

        IF `_rollback` THEN
        ROLLBACK;
        ELSE
        COMMIT;
        END IF;
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS `buatAkun`');
    }
}
