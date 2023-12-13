<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrasemhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prasemhas', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 12)->collation('utf8mb4_bin');
            $table->foreign('nim')->references('nim')->on('mahasiswas')->onDelete('restrict');
            $table->string('judul')->nullable();
            $table->double('nilai_banding', 4, 2)->nullable();
            $table->string('berkas_semhas')->nullable();
            $table->enum('status',['terima','pending','tolak','lulus'])->default('pending');
            $table->unsignedBigInteger('id_semhas')->nullable();
            $table->foreign('id_semhas')->references('id')->on('semhas')->onDelete('restrict');
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
        Schema::dropIfExists('prasemhas');
    }
}
