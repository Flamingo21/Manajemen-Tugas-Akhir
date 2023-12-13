<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogPrasemprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_prasempros', function (Blueprint $table) {
            $table->integer('no')->autoIncrement();
            $table->string('log_type',10);
            $table->string('user', 64);
            $table->integer('id');
            $table->string('nim', 12)->collation('utf8mb4_bin');
            $table->string('bidang');
            $table->string('judul')->nullable();
            $table->enum('diajukan_oleh',['dosen','mahasiswa','bersama'])->nullable();
            $table->string('berkas_uji')->nullable();
            $table->double('nilai_uji', 4, 2)->nullable();
            $table->double('nilai_banding', 4, 2)->nullable();
            $table->text('catatan_uji')->nullable();
            $table->string('berkas_sempro')->nullable();
            $table->enum('status',['terima','pending','tolak','lulus']);
            $table->unsignedBigInteger('id_sempro')->nullable();
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
        Schema::dropIfExists('log_prasempros');
    }
}
