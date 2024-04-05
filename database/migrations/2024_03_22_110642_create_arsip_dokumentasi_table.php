<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipDokumentasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip_dokumentasi', function (Blueprint $table) {
            $table->integerIncrements('id_arsip_dokumentasi');
            $table->string('kode_arsip_dokumentasi', 20);
            $table->date('tanggal_dokumentasi')->nullable();
            $table->unsignedInteger('id_departemen')->nullable();
            $table->string('judul', 100);
            $table->text('deskripsi')->nullable();
            $table->text('file_arsip_dokumentasi')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();

            $table->foreign('id_departemen')->references('id_departemen')->on('departemen')->constrained();
            $table->foreign('user_id')->references('id_user')->on('users')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsip_dokumentasi');
    }
}
