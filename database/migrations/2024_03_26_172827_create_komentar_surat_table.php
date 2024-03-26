<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_surat', function (Blueprint $table) {
            $table->id('id_komentar');
            $table->foreignId('id_arsip_surat')->references('id_arsip_surat')->on('arsip_surat')->constrained()->onDelete('cascade');
            $table->foreignId('id_user')->references('id_user')->on('users')->constrained()->onDelete('cascade');
            $table->string('komentar');
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
        Schema::dropIfExists('komentar_surat');
    }
}
