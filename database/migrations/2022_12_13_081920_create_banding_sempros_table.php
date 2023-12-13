<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBandingSemprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banding_sempros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_prasempro');
            $table->foreign('id_prasempro')->references('id')->on('prasempros')->onDelete('restrict');
            $table->string('nidn', 12)->collation('utf8mb4_bin');
            $table->foreign('nidn')->references('nidn')->on('dosens')->onDelete('restrict');
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
        Schema::dropIfExists('banding_sempros');
    }
}
