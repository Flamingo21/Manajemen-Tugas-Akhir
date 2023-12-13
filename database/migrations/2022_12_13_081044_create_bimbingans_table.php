<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBimbingansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bimbingans', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 12)->collation('utf8mb4_bin');
            $table->foreign('nim')->references('nim')->on('mahasiswas')->onDelete('restrict');
            $table->string('nidn', 12)->collation('utf8mb4_bin');
            $table->foreign('nidn')->references('nidn')->on('dosens')->onDelete('restrict');
            $table->text('catatan');
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
        Schema::dropIfExists('bimbingans');
    }
}
