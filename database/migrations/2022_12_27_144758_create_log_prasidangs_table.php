<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogPrasidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_prasidangs', function (Blueprint $table) {
            $table->integer('no')->autoIncrement();
            $table->string('log_type',10);
            $table->string('user', 64);
            $table->integer('id');
            $table->string('nim', 12)->collation('utf8mb4_bin');
            $table->string('judul')->nullable();
            $table->double('nilai_banding', 4, 2)->nullable();
            $table->string('berkas_sidang')->nullable();
            $table->enum('status',['terima','pending','tolak','lulus']);
            $table->unsignedBigInteger('id_sidang')->nullable();
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
        Schema::dropIfExists('log_prasidangs');
    }
}
