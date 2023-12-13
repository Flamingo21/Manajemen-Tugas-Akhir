<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_mahasiswas', function (Blueprint $table) {
            $table->integer('no')->autoIncrement();
            $table->string('log_type',10);
            $table->string('user', 64);
            $table->string('nim', 12)->collation('utf8mb4_bin');
            $table->string('nama', 64);
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_mahasiswas');
    }
}
