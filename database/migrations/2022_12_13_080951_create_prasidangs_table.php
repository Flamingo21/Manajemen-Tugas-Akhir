<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrasidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prasidangs', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 12)->collation('utf8mb4_bin');
            $table->foreign('nim')->references('nim')->on('mahasiswas')->onDelete('restrict');
            $table->string('judul')->nullable();
            $table->double('nilai_banding', 4, 2)->nullable();
            $table->string('berkas_sidang')->nullable();
            $table->enum('status',['terima','pending','tolak','lulus'])->default('pending');
            $table->unsignedBigInteger('id_sidang')->nullable();
            $table->foreign('id_sidang')->references('id')->on('sidangs')->onDelete('restrict');
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
        Schema::dropIfExists('prasidangs');
    }
}
