<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogBandingSidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_banding_sidangs', function (Blueprint $table) {
            $table->integer('no')->autoIncrement();
            $table->string('log_type',10);
            $table->string('user', 64);
            $table->integer('id');
            $table->unsignedBigInteger('id_prasidang');
            $table->string('nidn', 12)->collation('utf8mb4_bin');
            $table->double('nilai', 4, 2)->nullable();
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
        Schema::dropIfExists('log_banding_sidangs');
    }
}
