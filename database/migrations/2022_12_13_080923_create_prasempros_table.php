<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrasemprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prasempros', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 12)->collation('utf8mb4_bin');
            $table->foreign('nim')->references('nim')->on('mahasiswas')->onDelete('restrict');
            $table->string('bidang');
            $table->string('judul')->nullable();
            $table->enum('diajukan_oleh',['dosen','mahasiswa','bersama'])->nullable();
            $table->string('berkas_uji')->nullable();
            $table->double('nilai_uji', 4, 2)->nullable();
            $table->double('nilai_banding', 4, 2)->nullable();
            $table->text('catatan_uji')->nullable();
            $table->string('berkas_sempro')->nullable();
            $table->enum('status',['terima','pending','tolak','lulus'])->default('pending');
            $table->unsignedBigInteger('id_sempro')->nullable();
            $table->foreign('id_sempro')->references('id')->on('sempros')->onDelete('restrict');
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
        Schema::dropIfExists('prasempros');
    }
}
