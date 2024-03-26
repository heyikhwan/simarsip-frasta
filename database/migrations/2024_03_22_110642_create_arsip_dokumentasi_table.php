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
            $table->id('id_arsip_dokumentasi');
            $table->string('kode_arsip_dokumentasi', 20);
            $table->date('tanggal_dokumentasi')->nullable();
            $table->foreignId('id_departemen')->references('id_departemen')->on('departemen')->constrained();
            $table->string('judul', 100);
            $table->text('deskripsi')->nullable();
            $table->text('file_arsip_dokumentasi')->nullable();
            $table->foreignId('user_id')->references('id_user')->on('users')->constrained();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
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
