<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDospemSemhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dospem_semhas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dospem');
            $table->foreign('id_dospem')->references('id')->on('dospems')->onDelete('restrict');
            $table->unsignedBigInteger('id_semhas');
            $table->foreign('id_semhas')->references('id')->on('prasemhas')->onDelete('restrict');
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
        Schema::dropIfExists('dospem_semhas');
    }
}
