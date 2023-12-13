<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDospemSidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dospem_sidangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dospem');
            $table->foreign('id_dospem')->references('id')->on('dospems')->onDelete('restrict');
            $table->unsignedBigInteger('id_sidang');
            $table->foreign('id_sidang')->references('id')->on('prasidangs')->onDelete('restrict');
            $table->enum('accdp',['terima','pending'])->default('terima');
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
        Schema::dropIfExists('dospem_sidangs');
    }
}
